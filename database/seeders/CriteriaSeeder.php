<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('criteria')->insert([
            ['name' => 'Rata-rata Tes IQ', 'weight' => 40.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Penghasilan Orang Tua', 'weight' => 30.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Relasi Keluarga', 'weight' => 20.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Prestasi Anak', 'weight' => 10.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
