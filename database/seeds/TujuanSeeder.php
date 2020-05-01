<?php

use Illuminate\Database\Seeder;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // menggunakan faker
        factory(App\Tujuan::class, 3)->create();
    }
}
