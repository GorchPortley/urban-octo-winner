<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Design;
use App\Models\User;

class DesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Design::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(["Public","Private"]),
            'name' => $this->faker->name(),
            'card_description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'cost' => $this->faker->randomFloat(0, 0, 9999999999.),
            'public_description' => $this->faker->text(),
            'private_description' => $this->faker->text(),
            'category' => $this->faker->randomElement(["Subwoofer","Full-Range","Two-Way","Three-Way","Four-Way","Portable","Esoteric","Upgrades"]),
            'freq_low' => $this->faker->randomFloat(0, 0, 9999999999.),
            'freq_high' => $this->faker->randomFloat(0, 0, 9999999999.),
            'amplification' => $this->faker->randomElement(["Passive","Active","Hybrid"]),
            'amp_details' => $this->faker->text(),
            'owner_id' => User::factory(),
        ];
    }
}
