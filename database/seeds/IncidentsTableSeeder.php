<?php

use Illuminate\Database\Seeder;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidents')->delete();

        $incidents = array(
        	['id' => 1, 'title' => 'Updated', 'description' => 'So many files had been updated','service_id' => 1,'created_at' => new DateTime, 'updated_at' => new DateTime]
        );

        DB::table('incidents')->insert($incidents);
    }
}
