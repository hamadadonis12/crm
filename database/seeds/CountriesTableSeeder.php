<?php

use Illuminate\Database\Seeder;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        $countries = Config::get('countries');
        if (! $countries) {
            throw new Exception("Countries config file doesn't exists or empty.");
        }
        DB::table('countries')->insert($countries);
    }
}
