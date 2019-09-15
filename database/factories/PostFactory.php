<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
         'title' => $faker->word,
         'content' => $faker->text,
<<<<<<< HEAD
         'image' => $faker->'http://lorempixel.com/800/600/cats/' ,
=======
         'image' =>  $faker->'http://lorempixel.com/800/600/cats/',
>>>>>>> 1824ce499bfd4a76896efa6c1ecd3aef2d11902c
         'user_id' => function() {
         	return factory(App\User::class)->create()->id;
         }
    ];
});
