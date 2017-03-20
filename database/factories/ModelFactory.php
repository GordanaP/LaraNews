<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//Users
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName . ' ' .$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

//Categories
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

//Articles
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'category_id' => \App\Category::all()->random()->id,
        'title' => rtrim($faker->sentence, '.'),
        'body' => $faker->paragraph
    ];
});