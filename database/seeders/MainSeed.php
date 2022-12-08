<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Candidat;
use App\Models\Code;

class MainSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 200; $i++){
            $genCode = strtoupper(Str::random(4));

            $code = Code::where('value', $genCode)->first();
            while($code){
                $genCode = strtoupper(Str::random(4));
                $code = Code::where('value', $genCode)->first();
            }

            Code::create([
                'value' => $genCode,
                'validity' => 0,
                'voter_id' => null
            ]);
        }

        Candidat::create([
            'name' => 'Fofana',
            'surname' => 'Moamed'
        ]);

        Candidat::create([
            'name' => 'Mensa',
            'surname' => 'Luc'
        ]);


    }
}
