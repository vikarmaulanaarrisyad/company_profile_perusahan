<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'support@company.com'],
            [
                'name' => 'Administrator',
                'email' => 'support@company.com',
                'password' =>  Hash::make('123456'),
                'role_id' =>  1,
            ]
        );
    }
}
