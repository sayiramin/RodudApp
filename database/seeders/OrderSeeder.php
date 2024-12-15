<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::factory()->count(7)->create();
    }
}
