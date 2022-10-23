<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinanceOperation>
 */
class FinanceOperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'owner_id' => rand(1, 30000),
            'op_type' => fake()->numberBetween(1, 7),
            'op_date' => fake()->dateTimeThisYear(),
            'op_summa' => fake()->numberBetween(-1500, 2000) * 10000000000,
            'op_card_id' => 0,
            'system_date' => fake()->dateTimeThisYear(),
            'number' => fake()->numberBetween(70000, 99000),
            'balance_buh' => fake()->randomFloat(2, -1000, 2000) * 10000000000,
            'descr' => 'Описание операции',
            'isbuhdoc' => rand(0, 1),
            'end_user' =>  1,
        ];
    }
}
