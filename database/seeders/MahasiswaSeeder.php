<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create(['nama' => 'Udin', 'kelas' => 'TIF 220MC']);
        Mahasiswa::create(['nama' => 'Budi', 'kelas' => 'TIF 220KC']);
    }
}

