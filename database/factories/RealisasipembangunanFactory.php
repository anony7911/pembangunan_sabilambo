<?php

namespace Database\Factories;

use App\Models\Realisasipembangunan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RealisasipembangunanFactory extends Factory
{
    protected $model = Realisasipembangunan::class;

    public function definition()
    {
        return [
			'pembangunan_id' => $this->faker->name,
			'pelaksana' => $this->faker->name,
			'tanggal_mulai' => $this->faker->name,
			'tanggal_selesai' => $this->faker->name,
			'persentase' => $this->faker->name,
        ];
    }
}
