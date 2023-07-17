<?php

namespace Database\Factories;

use App\Models\Pembangunan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PembangunanFactory extends Factory
{
    protected $model = Pembangunan::class;

    public function definition()
    {
        return [
			'jenispembangunan_id' => $this->faker->name,
			'nama_pembangunan' => $this->faker->name,
			'lokasi' => $this->faker->name,
			'total_biaya' => $this->faker->name,
			'sumber_dana' => $this->faker->name,
			'pelaksana' => $this->faker->name,
			'deskripsi' => $this->faker->name,
			'berkas' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
