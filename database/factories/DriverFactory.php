<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Driver;
use App\Models\User;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'nominal_size' => $this->faker->numberBetween(-10000, 10000),
            'nominal_impedance' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text(),
            'card_description' => $this->faker->text(),
            'mfg_url' => $this->faker->word(),
            'mfg_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'category' => $this->faker->randomElement(["Subwoofer","Woofer","Midrange","Coaxial","Tweeter","Compression_Driver","Exciter"]),
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
            'owner_id' => User::factory(),
        ];
    }
}
