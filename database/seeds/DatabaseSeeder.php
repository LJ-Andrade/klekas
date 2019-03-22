<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        //factory(App\User::class,10)->create();  
        factory(App\Customer::class,10)->create(); 
    }
}
