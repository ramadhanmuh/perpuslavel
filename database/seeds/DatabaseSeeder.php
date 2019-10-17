<?php

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
        // role table
        $this->call(RolesTableSeeder::class);
        // user table
        $this->call(AdminUserSeeder::class);
        // Author table
        $this->call(AuthorsTableSeeder::class);
        // Book table
        $this->call(BooksTableSeeder::class);
    }
}
