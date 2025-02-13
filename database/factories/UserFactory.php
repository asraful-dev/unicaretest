<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        
        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // অথবা পূর্বের পাসওয়ার্ড হ্যাশ ব্যবহার করুন
            'photo' => $faker->imageUrl(60, 60),
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'role' => $faker->randomElement(['admin', 'vendor', 'user']),
            'status' => $faker->randomElement(['active', 'inactive']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}