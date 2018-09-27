<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TallersTableSeeder extends Seeder
{
    private $talleres = [
        ['Taller_1', 'Profesor_1'],
        ['Taller_2', 'Profesor_2'],
        ['Taller_3', 'Profesor_3'],
        ['Taller_4', 'Profesor_4'],
        ['Taller_5', 'Profesor_5'],
        ['Taller_6', 'Profesor_6'],
        ['Taller_7', 'Profesor_7'],
        ['Taller_8', 'Profesor_8'],
        ['Taller_9', 'Profesor_9'],
        ['Taller_10', 'Profesor_10'],
        ['Taller_11', 'Profesor_11'],
        ['Taller_12', 'Profesor_12'],
        ['Taller_13', 'Profesor_13'],
        ['Taller_14', 'Profesor_14'],
        ['Taller_15', 'Profesor_15'],
        ['Taller_16', 'Profesor_16']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate table
        DB::table('tallers')->truncate();


        $inscriptions = \App\Inscription::all();

        foreach ($inscriptions as $inscription) {
            // Populate table
            foreach ($this->talleres as $taller) {

                $disponibility = explode(',', $inscription->disponibility);

                DB::table('tallers')->insert([
                    'name' => $taller[0],
                    'professor' => $taller[1],
                    /*'day_one' => mt_rand(0,1),
                    'day_two' => mt_rand(0,1),
                    'day_three' => mt_rand(0,1),*/
                    'cupo' => rand(20,30),

                    'disponibility' => $disponibility[mt_rand(0,2)],

                    'inscription_id' => $inscription->id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

                ]);
            }
        }
    }
}
