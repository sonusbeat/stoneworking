<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Daniel González Briseño',
                'username' => 'sonusbeat',
                'email' => 'sonusbeat@hotmail.com',
                'password' => '$2y$10$vH8AaStINwm91ZHtCNbtnOVqZiB6NwkVk9J/7ZDYg3ne2LKB1Lk02',
                'image' => NULL,
                'type' => 'admin',
                'active' => 1,
                'remember_token' => 'msNkcXB6osisWtn3ez425FCqAOkZ4EgslLkoUIdQbyCUR1EdMVuFAS5lSRXd',
                'created_at' => '2017-02-01 19:01:52',
                'updated_at' => '2017-03-30 20:17:27',
            ),
        ));
        
        
    }
}
