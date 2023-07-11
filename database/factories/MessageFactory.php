<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Message::class;
    public function definition(): array
    {
        return [
            'fio' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->text(5, 10),
            'email' => $this->faker->email
        ];
    }
}
