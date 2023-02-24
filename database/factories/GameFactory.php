<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition()
    {
        // TODO: logic
        $userIds = User::pluck('id')->toArray();



        // TODO: return
        return [
            "code"=> $this->faker->unique()->regexify('[A-Z]{4}[0-9]{4}'),
            "name"=>$this->faker->words(4, true),
            "description"=>$this->faker->paragraph(),
            "rate"=>$this->faker->randomElement([1,2,3,4,5]),
            "is_hidden"=>$this->faker->randomElement([true,false]),
            "user_id"=> $this->faker->randomElement($userIds),
        ];
    }
}
