<?php

use App\Materi;
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
        $this->call(UsersTableSeeder::class);
        $this->call(KompetensiIntiSeeder::class);
        $this->call(KompetensiDasarSeeder::class);
        $this->call(IndikatorSeeder::class);
        $this->call(TujuanSeeder::class);
        $this->call(MateriSeeder::class);
    }
}
