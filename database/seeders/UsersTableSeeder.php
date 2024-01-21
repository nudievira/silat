<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'role_id' => '1',
            'email' => 'admin@example.com',
            'password_hash' => Hash::make('12345678'),

        ]);

    }
}
