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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Enable foreign key checks
    
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
