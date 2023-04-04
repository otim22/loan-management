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
            'password' => Hash::make('p@$$Word//')
        ]);
    }
}
