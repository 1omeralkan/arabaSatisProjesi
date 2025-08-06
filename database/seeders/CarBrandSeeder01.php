<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarBrandSeeder01 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //modelle ekleme(create-new),insert

        /* Model - new
        $brand=new CarBrand();
        $brand->name='Toyota';
        $brand->save();
        $brand=new CarBrand();
        $brand->name='Honda';
        $brand->save();
        */

        /* Model - create
        CarBrand::create([
           'name'=>'mercedes'
        ]);
        CarBrand::create([
            'name'=>'BMW'
        ]);
        */

        /*DB ile ekleme
        DB::table('car_brands')->insert([
           'name'=>'Nissan'
        ]);

        DB::table('car_brands')->insert([
            'name'=>'Renault'
        ]);
        */

        /* car_brands tablosundaki tüm nameleri A'ya çevirir.
        $brands = CarBrand::get();
        foreach ($brands as $brand) {
            $brand->name='A';
            $brand->save();
        }
        */
    }
}
