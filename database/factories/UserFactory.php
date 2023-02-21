<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
        $roles = Role::pluck('id')->toArray();
        // dd(array_rand($roles));
        // dd(Arr::random($roles));

        return [
            'username' => $this->faker->unique()->userName,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'password' => Hash::make('12345678'), 
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'role_id' => $this->faker->randomElement($roles),
        ];
    }
}
