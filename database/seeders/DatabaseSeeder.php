<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //clear the users table to prevent duplicate
        DB::table('users')->truncate();
        // User::factory(10)->create();

        User::create([
            'UserName' => 'TestUser',  
            'FirstName' => 'Test',
            'LastName' => 'User',
            'Role' => 'Admin',
            'Email' => 'test@example.com',
            'Password' => Hash::make('password'),
        ]);
    }
}
