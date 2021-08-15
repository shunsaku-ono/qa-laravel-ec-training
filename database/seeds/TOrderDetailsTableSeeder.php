<?php

use Illuminate\Database\Seeder;

class TOrderDetailsTableSeeder extends Seeder
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
            // 発送状態名によって発送日を変える
            $shipment_status_id = mt_rand(1, 2);
            // 発送状態名が準備中の場合、発送日はnull
            if ($shipment_status_id == 1) {
                $shipment_date = null;
                // 発送状態名が発送済みの場合、発送日を入力
            } elseif ($shipment_status_id == 2) {
                $shipment_date = $faker->dateTimeBetween('-2 week', 'now');
            }
            DB::table('t_order_details')->insert([
                'products_id' => $i,
                'order_id' => $i,
                'shipment_status_id' => $shipment_status_id,
                'order_detail_number' => $i,
                'order_quantity' => $faker->numberBetween(1, 20),
                'shipment_date' => $shipment_date,
            ]);
        }
    }
}
