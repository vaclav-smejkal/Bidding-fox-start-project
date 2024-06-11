<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Log;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Log::class;

    public function definition(): array
    {
        return [
            'project_id' => $this->faker->numberBetween(1,12),
            'items'=> $this->faker->numberBetween(0,30),
            'duration'=> $this->faker->randomFloat(2,0,20),
            'started_at'=> $this->faker->dateTimeBetween('-70 days','-5 days'),
            'finished_at' => $this->faker->boolean(50) ? $this->faker->dateTimeBetween('-2 days','+10 days') : null,
            'applied_to_all_times' => $this->faker->numberBetween(0,255),
            'user_id' => $this->faker->numberBetween(1,10),
            'rules' => $this->faker->text(10),
            'created_at' => $this->faker->dateTimeBetween('-70 days','-50 days'),
            'updated_at'=> $this->faker->dateTimeBetween('-20 days','-5 days'),
        ];
    }
}
