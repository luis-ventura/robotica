<?php

use Illuminate\Database\Seeder;
use App\Network;

class NetworkSeeder extends Seeder
{
    public function run()
    {
        Network::create(['status'=> '1']);
    }
}
