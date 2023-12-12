<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(private AdminRepository $adminRepository)
    {
        $this->adminRepository=$adminRepository;
    }

    public function index()
    {
        return view('admin.admins.index');
    }

    public function createAdmin(AdminRequest $request){
        $new_admin = Admin::create([
            'name'=>$request->input('name'),
            'surname'=>$request->input('surname'),
            'email'=>$request->input('email'),
            'password' => bcrypt($request->input('password')),
            'hashed_id' => md5('email')
        ]);
        return redirect(route('admin.index'));
    }
    
    public function getData()
    {
        $admins=$this->adminRepository->getData();
        return view('admin.admins.admins',['admins'=>$admins]);
    }

    public function adminEdit(Admin $admin)
    {
        return view('admin.admins.editForm',['admin'=>$admin]);
    }

    public function adminDelete(Admin $admin)
    {
        $this->adminRepository->delete($admin);
        return redirect(route('admin.getData'));
    }

    public function adminUpdate(Request $request,Admin $admin)
    {
        $data=[
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'email'=>$request->get('email'),
            'password' => bcrypt($request->input('password')),
        ];
        $adminUpdate=$this->adminRepository->update($data,$admin);
        return redirect(route('admin.getData'));
    }
}
