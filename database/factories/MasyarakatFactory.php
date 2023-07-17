<?php

namespace Database\Factories;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MasyarakatFactory extends Factory
{
    protected $model = Masyarakat::class;

    public function definition()
    {
        return [
			'nik' => $this->faker->name,
			'nama' => $this->faker->name,
			'tempat_lahir' => $this->faker->name,
			'tanggal_lahir' => $this->faker->name,
			'jenis_kelamin' => $this->faker->name,
			'alamat' => $this->faker->name,
			'rt' => $this->faker->name,
			'rw' => $this->faker->name,
			'user_id' => $this->faker->name,
        ];
    }
}
