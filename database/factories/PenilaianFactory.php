<?php

namespace Database\Factories;

use App\Models\Penilaian;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PenilaianFactory extends Factory
{
    protected $model = Penilaian::class;

    public function definition()
    {
        return [
			'pembangunan_id' => $this->faker->name,
			'user_id' => $this->faker->name,
			'rata_rata' => $this->faker->name,
			'komentar' => $this->faker->name,
        ];
    }
}
