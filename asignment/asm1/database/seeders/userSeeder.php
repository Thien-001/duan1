<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                "ten" => "admin",
                "email" => "admin@gmail.com",
                "matKhau" => "123456",
                "role"=> "admin",
            ],
            [
                "ten" => "Nguyen Van A",
                "email" => "vananguyen@gmail.com",
                "matKhau" => "34t21",
                "role"=> "user",
            ],
            [
                "ten" => "Tran Huu Tai",
                "email" => "taitran@gmail.com",
                "matKhau" => "y5452g",
                "role"=> "user",
            ],
            [
                "ten" => "TaiKon Nguyen",
                "email" => "taikonnguyen@gmail.com",
                "matKhau" => "osd3321",
                "role"=> "user",
            ],
        ]);
    }
}
