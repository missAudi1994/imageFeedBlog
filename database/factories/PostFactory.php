<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
         'title' => $faker->word,
         'content' => $faker->text,

         'image' => assets(["logo.png","default.jpg"]) ,

         'user_id' => function() {
         	return factory(App\User::class)->create()->id;
         }
    ];
});
