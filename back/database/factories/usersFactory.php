<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class usersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'gender'=>$this->faker->randomElement(['male','female']),
            'email'=>$this->faker->email(),
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'image'=>"1713838202.jpg.jpg",
            'password'=>$this->faker->password(),
            'role'=> $this->faker->randomElement(['1','0']),
        ];
    }
}
