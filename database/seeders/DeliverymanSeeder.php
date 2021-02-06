<?php

namespace Database\Seeders;

use App\Models\Deliveryman;
use Illuminate\Database\Seeder;

class DeliverymanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deliveryman::factory()->count(5)->create();
    }
}
