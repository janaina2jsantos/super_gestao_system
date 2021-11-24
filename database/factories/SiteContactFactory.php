<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SiteContact;
use Faker\Generator as Faker;


$factory->define(SiteContact::class, function (Faker $faker) {
    return [
        'contact_reason_id' => $faker->numberBetween(1,3),
        'name'  => $faker->name,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'message' => $faker->text(200)
    ];
});
