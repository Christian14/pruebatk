<?php

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
        DB::table('users')->delete();

        $users= array(
        	['id' => 1, 'name' => 'Christian', 'email' => 'christianbedon@gmail.com','password'=> bcrypt('christian'),'type' => 'admin', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 2, 'name' => 'Prueba', 'email' => 'prueba@prueba.com','password'=> bcrypt('prueba'),'type' => 'subscriber', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );

        DB::table('users')->insert($users);
    }
}
