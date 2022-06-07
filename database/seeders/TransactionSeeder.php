<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = app(Generator::class);
        $records = 20;
        $types = ['cm', 'cc', 'bt'];

        for ($i = 0; $i <= $records; $i++) {
            $type = $types[rand(0, 2)];
            $amount = rand(0, 250);
            switch ($type) {
                case 'cm':
                    $data = ['amount' => null, "correct-amount" => $amount];
                    break;
                case 'cc':
                    $data = ["cvv" => rand(100, 999), "amount" => $amount, "card-holder" => $faker->name(), "card-number" => "4" . rand(100000000000000, 999999999999999), "expire-date" => Carbon::yesterday()->addDay(rand(-50, 365))];
                    break;
                default:
                    $data = ["amount" => $amount, "costumer-name" => $faker->name(), "account-number" => Str::random(6), "transaction-date" => Carbon::yesterday()->addDay(rand(-50, 365))];
                    break;
            }
            Transaction::factory()->create(['type' => $type, 'amount' => $amount, 'data' => json_encode($data)]);
        }
    }
}
