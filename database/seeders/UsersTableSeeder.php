<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::create([
            'name' => 'Mr. Otim Fredrick', 
            'email' => 'fredrickot@gmail.com',
            'password' => Hash::make('p@$$Word//'),
            'role' => 'admin',
        ]);
        $users = User::create([
            'name' => 'Mr. John deere', 
            'email' => 'deere@gmail.com',
            'password' => Hash::make('p@$$Word//'),
            'role' => 'customer',
        ]);
        $users = User::create([
            'name' => 'Mr. Customer three', 
            'email' => 'customerthree@gmail.com',
            'password' => Hash::make('p@$$Word//'),
            'role' => 'customer',
        ]);
        $users = User::create([
            'name' => 'Mr. Customer four', 
            'email' => 'customerfour@gmail.com',
            'password' => Hash::make('p@$$Word//'),
            'role' => 'customer',
        ]);
        $users = User::create([
            'name' => 'Mr. Customer five', 
            'email' => 'customerfive@gmail.com',
            'password' => Hash::make('p@$$Word//'),
            'role' => 'customer',
        ]);
        $users = User::create([
            'name' => 'Mr. Customer six', 
            'email' => 'customersix@gmail.com',
            'password' => Hash::make('p@$$Word//'),
            'role' => 'customer',
        ]);
    }
}
