<?php
namespace App\Repositories;

use App\Models\Link;

class LinkRepository
{
    public function isLogged(): bool
    {
        return session()->has('admin');
    }

    public function logout(): void
    {
        session()->forget('admin');
    }
    
    public function get($data = [], $paginate = true):mixed
    {
        $links = Link::query();

        if (isset($data['old_url'])) {
            $links->where('old_url', $data['old_url']);
        }
        if (isset($data['new_url'])) {
            $links->where('new_url', $data['new_url']);
        }
        return $paginate ? $links->paginate(10) : $links->get();
    }

    public function store(array $data)
    {
        return Link::create($data);
    }
    
    public function update(array $data, Link $link){
        return $link->update($data);
    }

    public function destroy(Link $link):void
    {
        $link->delete();
    }
    
}