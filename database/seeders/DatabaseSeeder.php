<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Classes::factory(3)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Assignment::factory(20)->create();
        $fine = 0;
        $errors = 0;
        while ($fine < 40){
            try{
                \App\Models\Solution::factory()->create();
                $fine++;
                $errors = 0;
            }
            catch(Exception $e){
                if($errors ==3){
                    $errors = 0;
                    $fine++;
                }
            }
        }
    }
}
