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
            4 =>
            array (
                'id' => 5,
                'name' => 'Drones',
                'slug' => 'drones',
                'image' => 'category-images/drones.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Cameras',
                'slug' => 'cameras',
                'image' => 'category-images/cameras.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Gaming',
                'slug' => 'gaming',
                'image' => 'category-images/gaming.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Wearables',
                'slug' => 'wearables',
                'image' => 'category-images/wearables.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Smart Home',
                'slug' => 'smart-home',
                'image' => 'category-images/smart-home.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'AR/VR',
                'slug' => 'ar-vr',
                'image' => 'category-images/ar-vr.jpg',
                'is_active' => 1,
                'created_at' => '2025-09-22 10:00:00',
                'updated_at' => '2025-09-22 10:00:00',
            ),
        ));


    }
}
