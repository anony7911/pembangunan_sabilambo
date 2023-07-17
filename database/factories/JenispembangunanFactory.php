<?php

namespace Database\Factories;

use App\Models\Jenispembangunan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JenispembangunanFactory extends Factory
{
    protected $model = Jenispembangunan::class;

    public function definition()
    {
        return [
			'nama_jenis' => $this->faker->name,
			'keterangan' => $this->faker->name,
        ];
    }
}
