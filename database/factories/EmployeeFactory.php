<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        
        'first_name' => $faker -> firstName(),
        'last_name' => $faker -> lastName(),
        'birth_day' => $faker -> date(),
        'rating' => $faker -> numberBetween(0, 10)
    ];
});
