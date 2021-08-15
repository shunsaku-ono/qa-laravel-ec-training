<?php
use App\Purchase;
use Illuminate\Database\Seeder;

class TPurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Purchase::class, 20)->create();
    }
}
