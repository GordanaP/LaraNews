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
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'category_id' => function(){
            return factory('App\Category')->create()->id;
        },
        'title' => rtrim($faker->sentence, '.'),
        'body' => $faker->paragraph,
    ];
});

//Role
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

//Profile
$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'biography' => $faker->paragraph,
        'category_id' => function(){
            return factory('App\Category')->create()->id;
        },
        'user_id' => function(){
            return factory('App\User')->create()->id;
        }
    ];
});