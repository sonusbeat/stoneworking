<?php

use Illuminate\Database\Seeder;
use Stoneworking\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'Daniel González Briseño';
        $user->username = 'sonusbeat';
        $user->email = 'sonusbeat@hotmail.com';
        $user->password = bcrypt('secret');
        $user->type = 'admin';
        $user->active = true;
        $user->save();

        $user = new User;
        $user->name = 'Humberto Luna Lopez';
        $user->username = 'humberto';
        $user->email = 'stoneworking@gmail.com';
        $user->password = bcrypt('secret');
        $user->type = 'admin';
        $user->active = true;
        $user->save();

        $this->command->info('Users Seeded :)');
    }
}
