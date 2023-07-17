<?php

namespace Database\Factories;

use App\Models\Kategoripenilaian;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KategoripenilaianFactory extends Factory
{
    protected $model = Kategoripenilaian::class;

    public function definition()
    {
        return [
			'nama_kategori' => $this->faker->name,
			'keterangan' => $this->faker->name,
        ];
    }
}
