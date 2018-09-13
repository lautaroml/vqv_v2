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
        ['Taller_6', 'Profesor_6']
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

        // Populate table
        foreach ($this->talleres as $taller) {
            DB::table('tallers')->insert([
                'name' => $taller[0],
                'professor' => $taller[1],
                'day_one' => mt_rand(0,1),
                'day_two' => mt_rand(0,1),
                'day_three' => mt_rand(0,1),
                'cupo' => rand(20,30),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ]);
        }
    }
}
