<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Component;
use App\Models\Design;

class ComponentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Component::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'position' => $this->faker->randomElement(["LF","MF","HF","Other"]),
            'description' => $this->faker->text(),
            'freq_low' => $this->faker->randomFloat(0, 0, 9999999999.),
            'freq_hi' => $this->faker->randomFloat(0, 0, 9999999999.),
            'bl' => $this->faker->randomFloat(0, 0, 9999999999.),
            'mms' => $this->faker->randomFloat(0, 0, 9999999999.),
            'cms' => $this->faker->randomFloat(0, 0, 9999999999.),
            'rms' => $this->faker->randomFloat(0, 0, 9999999999.),
            'le' => $this->faker->randomFloat(0, 0, 9999999999.),
            're' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sd' => $this->faker->randomFloat(0, 0, 9999999999.),
            'fs' => $this->faker->randomFloat(0, 0, 9999999999.),
            'qes' => $this->faker->randomFloat(0, 0, 9999999999.),
            'qms' => $this->faker->randomFloat(0, 0, 9999999999.),
            'qts' => $this->faker->randomFloat(0, 0, 9999999999.),
            'vas' => $this->faker->randomFloat(0, 0, 9999999999.),
            'xmax' => $this->faker->randomFloat(0, 0, 9999999999.),
            'xlim' => $this->faker->randomFloat(0, 0, 9999999999.),
            'pe' => $this->faker->randomFloat(0, 0, 9999999999.),
            'vd' => $this->faker->randomFloat(0, 0, 9999999999.),
            'spl' => $this->faker->randomFloat(0, 0, 9999999999.),
            'design_id' => Design::factory(),
            'driver_id' => $this->faker->randomNumber(),
        ];
    }
}
