<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            // 'last_kana' => $this->faker->,
            // 'first_kana' => $this->faker->,
            'email' => $this->faker->unique()->safeEmail, 
            'tel' => $this->faker->unique()->phoneNumber,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'birthyear' => $this->faker->numberBetween(1900,2021),
            'birthmonth' => $this->faker->month,
            'birthday'  => $this->faker->dayOfMonth,
            'gender' => $this->faker->numberBetween(1,2),
            'post' => $this->faker->postcode,
            // 'prefecture' => $this->faker->,
            // 'address1'  => $this->faker->,
            // 'address2' => $this->faker->,
            'mailmagazin' => $this->faker->numberBetween(1,2),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
