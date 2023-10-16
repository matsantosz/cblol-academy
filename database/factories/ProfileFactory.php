<?php

namespace Database\Factories;

use App\Enums\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name'    => $this->faker->name(),
            'state'   => $this->faker->randomElement(State::cases()),
            'public'  => $this->faker->boolean(),
        ];
    }

    public function private(): self
    {
        return $this->state(['public' => false]);
    }

    public function public(): self
    {
        return $this->state(['public' => true]);
    }
}
