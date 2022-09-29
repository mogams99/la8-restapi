<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat data jurusan secara otomatis
        $jurusan = [
            [
                'kode_jurusan' => 'TI',
                'nama_jurusan' => 'Teknik Informatika',
                'status' => true
            ],
            [
                'kode_jurusan' => 'SI',
                'nama_jurusan' => 'Sistem Informasi',
                'status' => true
            ],
            [
                'kode_jurusan' => 'MI',
                'nama_jurusan' => 'Manajemen Informatika',
                'status' => true
            ],
        ];

        // Memanggil model jurusan dan mengisi data secara otomatis
        \App\Models\JurusanModel::insert($jurusan);
    }
}
