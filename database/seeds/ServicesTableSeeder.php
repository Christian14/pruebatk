<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->delete();

        $services = array(
        	['id' => 1, 'name' => 'Source', 'description' => 'Files that can help you', 'n_inc' => 0, 'status' => 'Operational']
        );

        DB::table('services')->insert($services);
    }
}
