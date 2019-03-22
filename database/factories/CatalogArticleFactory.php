<?php

use Faker\Generator as Faker;
use App\CatalogArticle;
/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(CatalogArticle::class, function (Faker $faker) {
    $rand = rand(10, 5000);
    return [
        'name' => $faker->word,
        'code' => $rand,
        'price' => $faker->randomFloat(2,5,10),
        'textile' => $faker->word,
        'description' => $faker->sentence(6,true),
        'user_id' => '1',
        'category_id' => '17',
        'status' => '1',
        'slug' => $faker->unique->word
    ];
});
