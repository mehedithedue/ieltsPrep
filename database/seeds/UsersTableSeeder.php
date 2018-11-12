<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 1)->create([
            'name' => 'mehedi',
            'email' => 'mehedi.thedue@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
