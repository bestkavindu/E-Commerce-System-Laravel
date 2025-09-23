<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Laptop',
                'slug' => 'laptop',
                'image' => 'category-images/01K480TF1YVH0X6F1JTZV1QPV7.png',
                'is_active' => 1,
                'created_at' => '2025-09-03 14:48:46',
                'updated_at' => '2025-09-03 14:48:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mobile Phone',
                'slug' => 'mobile-phone',
                'image' => 'category-images/01K4T032JTRZ9DRNYVA2BWR8VV.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-10 14:22:20',
                'updated_at' => '2025-09-10 14:22:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Audio',
                'slug' => 'audio',
                'image' => 'category-images/audio.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'TVs',
                'slug' => 'tvs',
                'image' => 'category-images/tvs.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
        ));
        
        
    }
}