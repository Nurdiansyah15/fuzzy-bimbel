<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FuzzyRule;

class FuzzyRuleSeeder extends Seeder
{
    public function run(): void
    {
        FuzzyRule::insert([
            [
                'harga_label' => 'murah',
                'jarak_label' => 'dekat',
                'fasilitas_label' => 'lengkap',
                'output' => 'tinggi',
            ],
            [
                'harga_label' => 'murah',
                'jarak_label' => 'dekat',
                'fasilitas_label' => 'sedang',
                'output' => 'tinggi',
            ],
            [
                'harga_label' => 'murah',
                'jarak_label' => 'sedang',
                'fasilitas_label' => 'sedang',
                'output' => 'sedang',
            ],
            [
                'harga_label' => 'sedang',
                'jarak_label' => 'sedang',
                'fasilitas_label' => 'lengkap',
                'output' => 'sedang',
            ],
            [
                'harga_label' => 'mahal',
                'jarak_label' => 'jauh',
                'fasilitas_label' => 'kurang',
                'output' => 'rendah',
            ],

             [
        'harga_label' => 'sedang',
        'jarak_label' => 'dekat',
        'fasilitas_label' => 'sedang',
        'output' => 'tinggi',
    ],
    [
        'harga_label' => 'murah',
        'jarak_label' => 'jauh',
        'fasilitas_label' => 'lengkap',
        'output' => 'sedang',
    ],
    [
        'harga_label' => 'sedang',
        'jarak_label' => 'jauh',
        'fasilitas_label' => 'sedang',
        'output' => 'rendah',
    ],
    [
        'harga_label' => 'mahal',
        'jarak_label' => 'dekat',
        'fasilitas_label' => 'lengkap',
        'output' => 'sedang',
    ],
    [
        'harga_label' => 'sedang',
        'jarak_label' => 'sedang',
        'fasilitas_label' => 'kurang',
        'output' => 'rendah',
    ],
        ]);
    }
}
