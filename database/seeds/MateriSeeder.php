<?php

use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // menggunakan faker
         factory(App\Materi::class, 2)->create();
    }
}
