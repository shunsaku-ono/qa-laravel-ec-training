<?php

use Illuminate\Database\Seeder;

class MUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factoryモデルを使用してユーザーを作成
        factory(App\MUser::class, 20)->create();
    }
}
