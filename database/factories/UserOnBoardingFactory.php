<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\UserOnBoarding::class, function (Faker $faker) {
    return [
        'user_id'=>3121,
        'created_at'=> '2016-07-19',
        'onboarding_perentage' => 40,
        'count_applications' => 0,
        'count_accepted_application'=>0
    ];
});
