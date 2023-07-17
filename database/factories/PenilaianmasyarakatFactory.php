<?php

namespace Database\Factories;

use App\Models\Penilaianmasyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PenilaianmasyarakatFactory extends Factory
{
    protected $model = Penilaianmasyarakat::class;

    public function definition()
    {
        return [
			'kategoripenilaian_id' => $this->faker->name,
			'pembangunan_id' => $this->faker->name,
			'masyarakat_id' => $this->faker->name,
			'nilai' => $this->faker->name,
        ];
    }
}
