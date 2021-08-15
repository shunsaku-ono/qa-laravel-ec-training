<?php

use Illuminate\Database\Seeder;

class TOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        for ($i = 1; $i <= 20; $i++) {
            DB::table('t_orders')->insert([
                'user_id' => mt_rand(1, 20),
                'order_date' => $faker->dateTimeBetween('-2 week', 'now'),
            ]);
        }

    }
}
