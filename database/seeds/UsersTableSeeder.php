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
                'password' => bcrypt('admin'),
                'image' => NULL,
                'type' => 'admin',
                'active' => 1,
                'remember_token' => '',
                'created_at' => '2017-02-01 19:01:52',
                'updated_at' => '2017-03-30 20:17:27',
            ),
        ));
        
        $this->command->info('Users Seeded Successfully');
    }
}
