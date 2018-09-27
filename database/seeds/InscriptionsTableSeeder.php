<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscriptionsTableSeeder extends Seeder
{
    private $disponibility_array = [
        'sab 9 a 14, sab 14 a 16, dom 9 a 14',
        'lun 9 a 14, dom 14 a 16, mie 9 a 14',
        'vie 9 a 14, lun 14 a 16, mie 9 a 14',
        'mar 9 a 14, mie 14 a 16, sab 9 a 14',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate table
        DB::table('inscriptions')->truncate();

        $faker = Faker\Factory::create();

        for ( $i = 0; $i < 15; $i++)
        {
            $title = $faker->sentence(10,true);

            DB::table('inscriptions')->insert([
                'title' => $title,
                'slug' => str_slug($title),
                'description' => $faker->text,
                'min_age' => mt_rand(15,20),
                'max_age' => mt_rand(20,30),
                'max_subscriptions' => mt_rand(2,5),
                'status' => mt_rand(0,1),
                'disponibility' => $this->disponibility_array[mt_rand(0,3)],
                //'available_from' => '17/09/2018',
                //'available_to' => '17/10/2018',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}