<?php 
namespace App\Repositories;

use App\Models\Admin;

class AdminRepository{

public function getData(){
    return Admin::all();
}

public function update(array $data,Admin $admin)
{
    $admin->update($data);
    return $admin;
}

public function delete(Admin $admin){
    $admin->delete();
}

}