<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidats')->insert([
            'name' => 'Fofana',
            'surname' => 'Mohamed'
        ]);

        DB::table('candidats')->insert([
            'name' => 'Mensa',
            'surname' => 'Luc Germain'
        ]);
    }
}
