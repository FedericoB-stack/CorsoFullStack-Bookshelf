<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    // public function definition(): array
    // {
    //     return [
    //         'first_name'  => fake()->firstName(),
    //         'last_name'   => fake()->lastName(),
    //         'nationality' => fake()->randomElement(['italiana', 'francese', 'inglese', 'spagnola']),
    //         'birth_year'  => fake()->numberBetween(1850, 1990),
    //     ];
    // }
    public function definition(): array
    {
        // locale di Faker => nazionalità da salvare
        $locales = [
            'it_IT' => 'italiana',
            'fr_FR' => 'francese',
            'en_GB' => 'inglese',
            'es_ES' => 'spagnola',
            'de_DE' => 'tedesca',
        ];

        $locale = array_rand($locales);   // restituisce una chiave a caso, es. 'fr_FR'
        $faker  = fake($locale);

        return [
            'first_name'  => $faker->firstName()."_fk",
            'last_name'   => $faker->lastName(),
            'nationality' => $locales[$locale],
            'birth_year'  => fake()->numberBetween(1850, 1990),
        ];
    }
    
}
