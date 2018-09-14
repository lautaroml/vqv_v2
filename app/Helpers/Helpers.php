<?php
/**
 * Created by PhpStorm.
 * User: lautaro
 * Date: 13/09/2018
 * Time: 21:25
 */

namespace App\Helpers;


use Carbon\Carbon;

class Helpers
{
    public static function ageFromBirthdayString(string $birthday) {
        return Carbon::createFromFormat('d/m/Y', $birthday)->age;
    }
}