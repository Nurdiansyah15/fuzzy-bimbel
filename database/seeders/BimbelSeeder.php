<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bimbel;

class BimbelSeeder extends Seeder
{
    public function run(): void
    {
        Bimbel::insert([
            [
                'nama' => 'Bimbel Cerdas',
                'alamat' => 'Jl. Merdeka No. 1',
                'biaya' => 150, // 150.000
                'jarak' => 800,
                'fasilitas' => 8, // lengkap
            ],
            [
                'nama' => 'Bimbel Pintar',
                'alamat' => 'Jl. Pendidikan No. 22',
                'biaya' => 100,
                'jarak' => 300,
                'fasilitas' => 5, // sedang
            ],
            [
                'nama' => 'Bimbel Juara',
                'alamat' => 'Jl. Belajar No. 10',
                'biaya' => 75,
                'jarak' => 1200,
                'fasilitas' => 3, // kurang
            ],
            [
                'nama' => 'Bimbel Hebat',
                'alamat' => 'Jl. Ilmu No. 45',
                'biaya' => 130,
                'jarak' => 600,
                'fasilitas' => 5,
            ],
              [
        'nama' => 'Bimbel Sukses',
        'alamat' => 'Jl. Cerdas No. 5',
        'biaya' => 90,
        'jarak' => 1000,
        'fasilitas' => 4, // sedang
    ],
    [
        'nama' => 'Bimbel Jaya',
        'alamat' => 'Jl. Harapan No. 12',
        'biaya' => 180,
        'jarak' => 500,
        'fasilitas' => 6, // sedang
    ],
    [
        'nama' => 'Bimbel Unggul',
        'alamat' => 'Jl. Prestasi No. 9',
        'biaya' => 120,
        'jarak' => 300,
        'fasilitas' => 7, // lengkap
    ],
    [
        'nama' => 'Bimbel Cendekia',
        'alamat' => 'Jl. Siswa No. 88',
        'biaya' => 60,
        'jarak' => 1500,
        'fasilitas' => 2, // kurang
    ],
    [
        'nama' => 'Bimbel Inspirasi',
        'alamat' => 'Jl. Masa Depan No. 21',
        'biaya' => 110,
        'jarak' => 700,
        'fasilitas' => 5, // sedang
    ],
        ]);
    }
}
