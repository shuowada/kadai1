<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class dentakuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siki= [
        '3*5','7-4',
    ];

    foreach ($siki as $sikis) {

        \App\:den:create([
            'siki' => $siki
        ]);
    }
$this->call(ComediansTableSeeder::class);

}
}
