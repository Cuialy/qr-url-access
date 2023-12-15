<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\DestroyRequest;
use App\Http\Requests\Link\EditRequest;
use App\Http\Requests\Link\SaveRequest;
use App\Http\Requests\Link\IndexRequest;
use App\Http\Requests\Link\StoreRequest;
use App\Http\Requests\Link\UpdateRequest;
use App\Models\Link;

use App\Repositories\LinkRepository;

class LinkController extends Controller
{
    public function __construct(private LinkRepository $linkRepository)
    {
        $this->linkRepository=$linkRepository;
    }
    public function index(IndexRequest $request)
    {
        $links=$this->linkRepository->get();
        return view('admin.links.index',compact('links'));
    }

    public function store(StoreRequest $request)
    {
        return view('admin.links.form');
    }

    private function generateRandomCode()
    {
        $newUrl = \Str::random(5);
        $isset = Link::where('new_url', $newUrl)->first();

        if ($isset) {
           return $this->generateRandomCode();
        }
        return $newUrl;
    }

    public function save(SaveRequest $request)
    {
        $newUrl = $this->generateRandomCode();
        $this->linkRepository->store([
            'user_id'=>session()->get('admin')->id,
            'old_url'=>$request->get('old_url'),
            'new_url' => strtoupper($newUrl),
            'hashed_id' => md5($request->get('email').time().rand(0,1000)),
        ]);
        return redirect()->route('links.index')->with($this->sendAlert('success','Success','Link added successfully'));
    }

    
   public function update(UpdateRequest $request, Link $link)
{   
    $data = [
        'old_url' => $request->get('old_url'),
    ];

    if ($request->has('new_url')) {
        $newUrl = $request->get('new_url');
        $isset = Link::where('old_url', $newUrl)->where('id', $link->id)->first();
        if ($isset) {
            $newUrl = $this->generateRandomCode();
        }

        $data['new_url'] = strtoupper($newUrl);
    }

    $link->update($data);
    return redirect()->route('links.index')->with($this->sendAlert('success', 'Success', 'Link updated successfully'));
}


    public function edit(EditRequest $request,Link $link)
    {
        return view('admin.links.form',compact('link'));
    }

    public function destroy(DestroyRequest $request,Link $link)
    {
        $this->linkRepository->destroy($link);
        return redirect()->route('links.index')->with($this->sendAlert('success','Success','Link delete successfully'));
    }
}
