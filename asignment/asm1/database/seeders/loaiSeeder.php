<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class loaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("loais")->insert([
            [
                "tenLoai" => "Hanboro",
                "anh" => "sp1.jpg",
                "id_loai" => 1,
            ],
            [
                "tenLoai" => "Casio",
                "anh" => "sp2.webp",
                "id_loai" => 2,
            ],
            [
                "tenLoai" => "Maserati",
                "anh" => "sp3.png",
                "id_loai" => 3,
            ],
        ]);
    }
}
