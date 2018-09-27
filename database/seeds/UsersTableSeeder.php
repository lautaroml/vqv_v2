<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate table
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'first_name' =>'Lautaro',
            'last_name' =>'Lautaro',
            'type' => 1,
            'document' =>'12345678',
            'age' =>'32',
            'birthday' =>'1986-03-19 18:43:17',
            'email' =>'lautaroml@hotmail.com',
            'password' => Hash::make(env('ADMIN_PASS')),
            'country_id' => 12,
            'state_id' =>2,
            'elenco' =>0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
