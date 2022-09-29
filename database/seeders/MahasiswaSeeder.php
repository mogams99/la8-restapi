<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat data mahasiswa secara otomatis
        $mahasiswa = [
            [
                'nim' => '19082010001',
                'jurusan_id' => 1,
                'nama_lengkap' => 'Rizky',
                'jenis_kelamin' => true,
                'alamat' => 'Jl. Kaliurang KM 14,5 No. 9, Yogyakarta',
                'no_hp' => '081234567890',
                'status' => true
            ],
            [
                'nim' => '19082010002',
                'jurusan_id' => 2,
                'nama_lengkap' => 'Rizky',
                'jenis_kelamin' => true,
                'alamat' => 'Jl. Kaliurang KM 14,5 No. 9, Yogyakarta',
                'no_hp' => '081234567890',
                'status' => true
            ],
            [
                'nim' => '19082010003',
                'jurusan_id' => 3,
                'nama_lengkap' => 'Rizky',
                'jenis_kelamin' => true,
                'alamat' => 'Jl. Kaliurang KM 14,5 No. 9, Yogyakarta',
                'no_hp' => '081234567890',
                'status' => true
            ],
        ];

        // Memanggil model mahasiswa dan mengisi data secara otomatis
        \App\Models\MahasiswaModel::insert($mahasiswa);
    }
}
