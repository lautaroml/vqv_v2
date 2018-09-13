<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElencosTableSeeder extends Seeder
{
    private $elencos = [
        'Elenco_1',
        'Elenco_2',
        'Elenco_3',
        'Elenco_4',
        'Elenco_5',
        'Elenco_6'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate table
        DB::table('elencos')->truncate();

        // Populate table
        foreach ($this->elencos as $elenco) {
            DB::table('elencos')->insert([
                'name' => $elenco,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ]);
        }
    }
}
