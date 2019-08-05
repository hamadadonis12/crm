<?php

use Illuminate\Database\Seeder;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $cities = Config::get('cities');
        if (! $cities) {
            throw new Exception("Cities config file doesn't exists or empty.");
        }
        DB::table('cities')->insert($cities);
    }
}
