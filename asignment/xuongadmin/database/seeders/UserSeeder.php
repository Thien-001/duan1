<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name"=> "Admin",
                "email"=> "admin@gmail.com",
                "password"=> Hash::make("123456"),
                "role"=> "admin"
            ],
            [
                "name"=> "Nguyen Van A",
                "email"=> "vananguyen@gmail.com",
                "password"=> Hash::make("22222"),
                "role"=> "user"
            ],
            [
                "name"=> "Nguyen Van Ba",
                "email"=> "babao@gmail.com",
                "password"=> Hash::make("624"),
                "role"=> "user"
            ],
        ]);
    }
}
