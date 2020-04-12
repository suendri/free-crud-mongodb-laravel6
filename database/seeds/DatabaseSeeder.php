<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Mahasiswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 5000)->create();
        factory(Mahasiswa::class, 5000)->create();
    }
}
