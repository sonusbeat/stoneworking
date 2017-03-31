<?php

use Illuminate\Database\Seeder;
use Stoneworking\Models\Work;

class WorksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Work::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
        \DB::table('works')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 2,
                'name' => 'Cocina con Granito Negro Absoluto',
                'permalink' => 'cocina-con-granito-negro-absoluto',
                'image' => 'cocina-granito-negro-absoluto',
                'image_alt' => 'Cocina con Granito Negro Absoluto',
                'material' => 'Granito',
                'description' => NULL,
                'active' => 1,
                'meta_title' => 'Cocina con Granito Negro Absoluto',
                'meta_description' => 'Hermosa cubierta para cubierta de Grantio Negro Absoluto',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-01 19:07:15',
                'updated_at' => '2017-02-01 19:09:10',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 2,
                'name' => 'Cubierta de Granito Negro Exótico para Quemadores',
                'permalink' => 'cubierta-de-granito-negro-exótico-para-quemadores',
                'image' => 'cocina-granito-negro-exotico',
                'image_alt' => 'Cubierta de Granito Negro Exótico para Quemadores',
                'material' => 'Granito',
                'description' => NULL,
                'active' => 1,
                'meta_title' => 'Cubierta de Granito Negro Exótico para Quemadores',
                'meta_description' => 'Hermosa cocina con cubierta Granito Negro Exótico para quemadores de estufa',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-01 19:10:51',
                'updated_at' => '2017-02-07 13:09:54',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 2,
                'name' => 'Cocina con cubierta de Granito Negro San Gabriel',
                'permalink' => 'cocina-con-cubierta-de-granito-negro-san-gabriel',
                'image' => 'cocina-granito-negro-san-gabriel',
                'image_alt' => 'Cocina con cubierta de Granito Negro San Gabriel',
                'description' => NULL,
                'material' => 'Granito',
                'active' => 1,
                'meta_title' => 'Cocina con cubierta de Granito Negro San Gabriel',
                'meta_description' => 'Hermosa cocina con cubierta de Granito Negro San Gabriel',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-01 19:12:00',
                'updated_at' => '2017-02-01 19:12:07',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 2,
                'name' => 'Cocina tipo L con Barra de Granito Negro',
                'permalink' => 'cocina-tiop-l-con-barra-de-granito-negro',
                'image' => 'cocina-de-granito-negro',
                'image_alt' => 'Cocina con barra de Granito Negro',
                'material' => 'Granito',
                'description' => NULL,
                'active' => 1,
                'meta_title' => 'Cocina tiop L con Barra de Granito Negro',
                'meta_description' => 'Cocina con cubierta de Granito Negro y Barra desayunadora',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-01 19:13:34',
                'updated_at' => '2017-02-07 13:08:23',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 2,
                'name' => 'Cocina con cubierta de Granito Blanco Cristal',
                'permalink' => 'cocina-con-cubierta-de-granito-blanco-cristal',
                'image' => 'cocina-con-cubierta-de-granito-blanco-cristal',
                'image_alt' => 'Cocina con cubierta de Granito Blanco Cristal',
                'material' => 'Granito',
                'description' => NULL,
                'active' => 1,
                'meta_title' => 'Cocina con cubierta de Granito Blanco Cristal',
                'meta_description' => 'Hermosa cocina con Granito Blanco Cristal con barra desayunadora',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-07 13:28:47',
                'updated_at' => '2017-02-07 13:48:03',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 2,
                'name' => 'Cocina con Cubierta de Granito Alaska',
                'permalink' => 'cocina-con-cubierta-de-granito-alaska',
                'image' => 'cocina-con-cubierta-de-granito-alaska',
                'image_alt' => 'Cocina con Cubierta de Granito Alaska',
                'material' => 'Granito',
                'description' => NULL,
                'active' => 1,
                'meta_title' => 'Cocina con Cubierta de Granito Alaska',
                'meta_description' => 'Hermosa cubierta de Granito Alaska en Estufa',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-02-07 13:59:17',
                'updated_at' => '2017-02-07 13:59:26',
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 2,
                'name' => 'Cocina con Cubierta de Granito Amarillo Siamen',
                'permalink' => 'cocina-cubierta-granito-amarillo-siamen',
                'image' => 'cocina-granito-amarillo-siamen',
                'image_alt' => 'Cocina con cubierta de Granito Amarillo Siamen',
                'description' => 'Hermosa cubierta de Granito tipo Alaska en cocina integral',
                'material' => 'Granito',
                'active' => 1,
                'meta_title' => 'Cocina con Cubierta de Granito Amarillo Siamen',
                'meta_description' => 'Cocina Integral con hermosa cubierta de Granito Amarillo Siamen',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-03-30 20:00:59',
                'updated_at' => '2017-03-30 20:05:00',
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 2,
                'name' => 'Cocina con Granito Negro San Gabriel Cepillado',
                'permalink' => 'cocina-granito-negro-san-gabriel-cepillado-1',
                'image' => 'cocina-granito-negro-san-gabriel-cepillado-1',
                'image_alt' => 'Cocina con Granito Negro San Gabriel Cepillado',
                'material' => 'Granito',
                'description' => 'Cocina con Granito Negro San Gabriel Cepillado, popularmente conocido como molcajete ya que cuenta con una textura rugosa expectacular',
                'active' => 1,
                'meta_title' => 'Cocina con Granito Negro San Gabriel Cepillado',
                'meta_description' => 'Cocina con Granito Negro San Gabriel Cepillado, popularmente conocido como molcajete ya que cuenta con una textura rugosa expectacular',
                'meta_robots' => 'index, follow',
                'created_at' => '2017-03-30 20:12:57',
                'updated_at' => '2017-03-31 00:36:06',
            ),
        ));

        $this->command->info('Works Seeded Successfully');
        
    }
}
