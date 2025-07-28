<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Town;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CityTownSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(storage_path('app/sehir_ilce.json'));
        $data = json_decode($json, true);

        foreach ($data as $cityName => $towns) {
            $city = City::create(['name' => $cityName]);

            foreach ($towns as $townName) {
                Town::create([
                    'city_id' => $city->id,
                    'name' => $townName
                ]);
            }
        }

    }
}
