<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // DB::statement('PRAGMA foreign_keys = OFF;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            $this->call(SectionTableSeeder::class);
            $this->call(CategoryTableSeeder::class);
            $this->call(WorkTableSeeder::class);
        // DB::statement('PRAGMA foreign_keys = ON;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Model::reguard();
        $this->call('CategoriesTableSeeder');
        $this->call('WorksTableSeeder');
    }
}
