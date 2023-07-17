<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $sumberdana = [
            [
                'nama_sumber' => 'APBN',
                'keterangan' => 'Anggaran Pendapatan Belanja Negara',
            ], [
            'nama_sumber' => 'APBD',
            'keterangan' => 'Anggaran Pendapatan dan Belanja Daerah',
        ], [
            'nama_sumber' => 'DAK',
            'keterangan' => 'Dana Alokasi Khusus',
        ], [
            'nama_sumber' => 'CSR',
            'keterangan' => 'Corporate Social Responsibility',
        ],  [
            'nama_sumber' => 'Swadaya',
            'keterangan' => 'Swadaya',
        ], [
            'nama_sumber' => 'Lainnya',
            'keterangan' => 'Lainnya',
        ]
    ];

        foreach ($sumberdana as $sumberdana) {
            \App\Models\Sumberdana::create($sumberdana);
        }
    }
}
