<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository
{
    public function get($data = [], $paginate = true, $orderBy = 'id', $order = 'desc'): array|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
    {
        $links = Link::query();

        if (isset($data['old_url'])) {
            $links->where('old_url', $data['old_url']);
        }
        if (isset($data['hashed_id'])) {
            $links->where('hashed_id', $data['hashed_id']);
        }
        if (isset($data['new_url'])) {
            $links->where('new_url', $data['new_url']);
        }
        $links->orderBy($orderBy, $order);
        return $paginate ? $links->paginate(10) : $links->get();
    }

    public function generateRandomCode($code = null): string
    {
        $random = \Str::random(rand(3,7));
        $isExist = Link::where('new_url', $code ?? $random)->count();

        if ($isExist) {
           return $this->generateRandomCode($random);
        }
        return strtoupper($code ?? $random);
    }


    public function store(array $data)
    {
        return Link::create($data);
    }

    public function update(array $data, Link $link)
    {
        return $link->update($data);
    }

    public function destroy(Link $link): void
    {
        $link->delete();
    }
}
