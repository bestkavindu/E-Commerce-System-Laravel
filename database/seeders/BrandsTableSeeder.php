<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('brands')->delete();

        \DB::table('brands')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Samsung',
                'slug' => 'samsung',
                'image' => 'brand-images/samsung.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Apple',
                'slug' => 'apple',
                'image' => 'brand-images/01K4T0161GJBXP2ESF0Z6QZ52T.svg',
                'is_active' => 1,
                'created_at' => '2025-09-10 13:41:19',
                'updated_at' => '2025-09-10 14:21:18',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Dell',
                'slug' => 'dell',
                'image' => 'brand-images/dell.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Sony',
                'slug' => 'sony',
                'image' => 'brand-images/sony.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'LG',
                'slug' => 'lg',
                'image' => 'brand-images/lg.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Google',
                'slug' => 'google',
                'image' => 'brand-images/google.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'DJI',
                'slug' => 'dji',
                'image' => 'brand-images/dji.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Canon',
                'slug' => 'canon',
                'image' => 'brand-images/canon.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Microsoft',
                'slug' => 'microsoft',
                'image' => 'brand-images/microsoft.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Garmin',
                'slug' => 'garmin',
                'image' => 'brand-images/garmin.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Bose',
                'slug' => 'bose',
                'image' => 'brand-images/bose.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'OnePlus',
                'slug' => 'oneplus',
                'image' => 'brand-images/oneplus.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Dyson',
                'slug' => 'dyson',
                'image' => 'brand-images/dyson.svg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
        ));


    }
}
