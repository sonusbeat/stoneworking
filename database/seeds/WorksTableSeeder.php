<?php

use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('works')->delete();
        
        \DB::table('works')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 2,
                'name' => 'Cocina de Granito Maracuya',
                'permalink' => 'cocina-de-granito-maracuya',
                'image' => '21-cocina-granito-maracuya',
                'image_alt' => 'Cocina de Granito Maracuya',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Cocina de Granito Maracuya',
                'meta_description' => 'Cocina de Granito Maracuya',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-21 21:04:00',
                'updated_at' => '2017-01-31 18:07:31',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 2,
                'name' => 'Cocina Granito Negro Cristal',
                'permalink' => 'cocina-granito-negro-cristal',
                'image' => 'cocina-granito-blanco-cristal',
                'image_alt' => 'Cocina Granito Negro Cristal',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Cocina Granito Negro Cristal',
                'meta_description' => 'Cocina Granito Negro Cristal',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-23 17:07:45',
                'updated_at' => '2017-01-31 18:07:15',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'name' => 'Baño con mármol travertino',
                'permalink' => 'baño-con-mármol-travertino',
                'image' => '01-cocina-marmol-travertino',
                'image_alt' => 'Baño con mármol travertino',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Baño con mármol travertino',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita natus beatae itaque mollitia quidem unde molestiae, quasi veniam corrupti. Ducimus possimus',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 17:51:19',
                'updated_at' => '2017-01-31 17:51:25',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 1,
                'name' => 'Lavavo con cuarzo rojo',
                'permalink' => 'lavavo-con-cuarzo-rojo',
                'image' => '04-lavabo-cuarzo-rojo',
                'image_alt' => 'Lavavo con cuarzo rojo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Lavavo con cuarzo rojo',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit debitis placeat saepe perspiciatis expedita, maiores rerum, culpa mollitia sunt id iure porro repellat',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 17:52:57',
                'updated_at' => '2017-01-31 17:53:01',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 1,
                'name' => 'Lavavo granito verde uvatuba',
                'permalink' => 'lavavo-granito-verde-uvatuba',
                'image' => '05-lavabo-granito-verde-ubatuba',
                'image_alt' => 'Lavavo granito verde uvatuba',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Lavavo granito verde uvatuba',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit debitis placeat saepe perspiciatis expedita, maiores rerum, culpa mollitia sunt id iure porro repellat',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 17:54:00',
                'updated_at' => '2017-01-31 17:57:15',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 1,
                'name' => 'Lavavo granito alaska',
                'permalink' => 'lavavo-granito-alaska',
                'image' => '06-lavabo-granito-alaska',
                'image_alt' => 'Lavavo granito alaska',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Lavavo granito alaska',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit debitis placeat saepe perspiciatis expedita, maiores rerum, culpa mollitia sunt id iure porro repellat',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 17:54:49',
                'updated_at' => '2017-01-31 17:54:58',
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 1,
                'name' => 'Lavavo cuarzo blanco',
                'permalink' => 'lavavo-cuarzo-blanco',
                'image' => '07-lavabo-cuarzo-blanco',
                'image_alt' => 'Lavavo cuarzo blanco',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Lavavo cuarzo blanco',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit debitis placeat saepe perspiciatis expedita, maiores rerum, culpa mollitia sunt id iure porro repellat',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 17:55:27',
                'updated_at' => '2017-01-31 17:55:31',
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 2,
                'name' => 'Cocina Granito San Gabriel',
                'permalink' => 'cocina-granito-san-gabriel',
                'image' => 'cocina-granito-negro-san-gabriel',
                'image_alt' => 'Cocina Granito San Gabriel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Cocina Granito San Gabriel',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit debitis placeat saepe perspiciatis expedita, maiores rerum, culpa mollitia sunt id iure porro repellat',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 18:31:54',
                'updated_at' => '2017-01-31 18:32:09',
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 2,
                'name' => 'Cocina Negro Absoluto',
                'permalink' => 'cocina-negro-absoluto',
                'image' => 'cocina-granito-negro-absoluto',
                'image_alt' => 'Cocina Negro Absoluto',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Cocina Negro Absoluto',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit debitis placeat saepe perspiciatis expedita, maiores rerum, culpa mollitia sunt id iure porro repellat',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 18:32:51',
                'updated_at' => '2017-01-31 18:32:55',
            ),
            9 => 
            array (
                'id' => 10,
                'category_id' => 2,
                'name' => 'Cocina Cuarzo Gris',
                'permalink' => 'cocina-cuarzo-gris',
                'image' => '10-cocina-cuarzo-gris',
                'image_alt' => 'Cocina Cuarzo Gris',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Cocina Cuarzo Gris',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit debitis placeat saepe perspiciatis expedita, maiores rerum, culpa mollitia sunt id iure porro repellat',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 18:33:40',
                'updated_at' => '2017-01-31 19:54:50',
            ),
            10 => 
            array (
                'id' => 11,
                'category_id' => 3,
                'name' => ' Cocina con Granito Negro y Barra',
                'permalink' => 'cocina-con-granito-negro-y-barra',
                'image' => '01-cafe-granito-crema-terra',
                'image_alt' => 'Cocina con Granito Negro y Barra',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Cocina con Granito Negro y Barra',
                'meta_description' => 'Lorem lipsum dolem dolor',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 21:17:00',
                'updated_at' => '2017-01-31 21:18:22',
            ),
            11 => 
            array (
                'id' => 13,
                'category_id' => 3,
                'name' => 'Lavavo Marmol Traventino',
                'permalink' => 'lavavo-marmol-traventino',
                'image' => '08-lavabo-marmol-travertino',
                'image_alt' => 'Lavavo Marmol Traventino',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Lavavo Marmol Traventino',
                'meta_description' => 'Lorem lipsum dolem dolor',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 21:22:54',
                'updated_at' => '2017-01-31 21:23:05',
            ),
            12 => 
            array (
                'id' => 14,
                'category_id' => 3,
                'name' => 'Lavavo Gris Oxxford',
                'permalink' => 'lavavo-gris-oxxford',
                'image' => '09-lavabo-granito-gris-oxford',
                'image_alt' => 'Lavavo Gris Oxxford',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Lavavo Gris Oxxford',
                'meta_description' => 'Lorem lipsum dolem dolor',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 21:23:50',
                'updated_at' => '2017-01-31 21:23:55',
            ),
            13 => 
            array (
                'id' => 15,
                'category_id' => 3,
                'name' => 'Lavavo granito alaska perron',
                'permalink' => 'lavavo-granito-alaska-perron',
                'image' => '10-lavabo-granito-alaska',
                'image_alt' => 'Lavavo granito alaska perron',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Lavavo granito alaska perron',
                'meta_description' => 'Lipsum dolem dolore',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 21:24:33',
                'updated_at' => '2017-01-31 21:24:39',
            ),
            14 => 
            array (
                'id' => 16,
                'category_id' => 3,
                'name' => 'Cocina Negro Absoluto con Madera',
                'permalink' => 'cocina-negro-absoluto-con-madera',
                'image' => '28-cocina-granito-negro-absoluto-con-madera',
                'image_alt' => 'Cocina Negro Absoluto con Madera',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto itaque quis ad consequatur suscipit non, repudiandae velit voluptates ullam cumque ipsum',
                'active' => 1,
                'meta_title' => 'Cocina Negro Absoluto con Madera',
                'meta_description' => 'Lorem lipsum dolor dolem',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-01-31 21:26:02',
                'updated_at' => '2017-01-31 21:26:07',
            ),
        ));

        $this->command->info('Works table seeded successfully :)');
        
    }
}
