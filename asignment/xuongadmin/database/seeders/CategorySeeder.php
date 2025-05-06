<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([

            [
                "name" => "Hanboro",
                "image" => "sp1.jpg",
                "parent_id" => 1,
            ],
            [
                "name" => "Casio",
                "image" => "sp2.webp",
                "parent_id" => 2,
            ],
            [
                "name" => "Maserati",
                "image" => "sp3.png",
                "parent_id" => 3,
            ],
        ]);
    }
}
