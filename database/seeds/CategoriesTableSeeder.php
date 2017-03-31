<?php

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
                'name' => 'Baños',
                'permalink' => 'banos',
                'active' => 0,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-01 19:03:07',
                'updated_at' => '2017-02-01 19:05:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cocinas',
                'permalink' => 'cocinas',
                'active' => 1,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-01 19:05:24',
                'updated_at' => '2017-02-01 19:05:29',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Negocios',
                'permalink' => 'negocios',
                'active' => 0,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-01 19:05:44',
                'updated_at' => '2017-02-01 19:05:44',
            ),
        ));
        
        
    }
}
