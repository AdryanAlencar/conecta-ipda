<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use App\Models\City;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = json_decode(Storage::get('seed.json'), true);
        foreach ($json['estados'] as $state) {
            $savedState = State::create([
                'name' => $state['nome'],
                'initials' => $state['sigla'],
            ]);

            foreach ($state['cidades'] as $city) {
                City::create([
                    'name' => $city,
                    'state_id' => $savedState->id,
                ]);
            }

        }
    }
}
