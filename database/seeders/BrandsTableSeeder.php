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
                'id' => 2,
                'name' => 'Apple',
                'slug' => 'apple',
                'image' => 'brand-images/01K4T0161GJBXP2ESF0Z6QZ52T.svg',
                'is_active' => 1,
                'created_at' => '2025-09-10 13:41:19',
                'updated_at' => '2025-09-10 14:21:18',
            ),
        ));
        
        
    }
}