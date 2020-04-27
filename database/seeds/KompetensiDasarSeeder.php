<?php

use Illuminate\Database\Seeder;

class KompetensiDasarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\KompetensiDasar::class, 5)->create();
    }
}
