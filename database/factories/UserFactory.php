<?php

use App\Post;
use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'email' => $faker->email,
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
