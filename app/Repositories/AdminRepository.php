<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{

    public function isLogged(): bool
    {
        return session()->has('admin');
    }

    public function logout(): void
    {
        session()->forget('admin');
    }

    public function get($data = [], $paginate = false): mixed
    {
        $admins = Admin::query();

        if (isset($data['email'])) {
            $admins->where('email', $data['email']);
        }
        if (isset($data['name'])) {
            $admins->where('name', $data['name']);
        }
        if (isset($data['surname'])) {
            $admins->where('surname', $data['surname']);
        }

        return $paginate ? $admins->paginate(10) : $admins->get();
    }

    public function update(array $data, Admin $admin): Admin|bool
    {
        return $admin->update($data);
    }

    public function store(array $data)
    {
        return Admin::create($data);
    }

    public function destroy(Admin $admin): void
    {
        $admin->delete();
    }

}
