<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin',
            'surname' => 'Test',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('admin'),
            'hashed_id' => md5(time()),
        ]);
    }
}
