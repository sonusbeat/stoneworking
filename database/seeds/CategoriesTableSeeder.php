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
                'active' => 1,
                'meta_title' => '',
                'meta_description' => '',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-21 18:48:31',
                'updated_at' => '2017-01-31 17:49:39',
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
                'created_at' => '2017-01-21 18:48:31',
                'updated_at' => '2017-01-21 19:04:07',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Negocios',
                'permalink' => 'negocios',
                'active' => 1,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-21 18:48:31',
                'updated_at' => '2017-01-31 17:58:59',
            ),
        ));
        
        $this->command->info('Categories table seeded :)');
    }
}
