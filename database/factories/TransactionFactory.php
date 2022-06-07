<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['cm','cc','bt'];
        return [
            'type' => $types[rand(0,2)],
            'amount' => rand(1,50),
            'data'=> json_encode([]),
            'ts_register'=>Carbon::now()->timestamp
        ];
    }
}
