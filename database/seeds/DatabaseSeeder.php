<?php

use App\Models\Category;
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
        
        $this->call([
            //UsersTableSeeder::class,
            //PostSeeder::class,
            //CategorySeeder::class,
        ]);
    }
}
