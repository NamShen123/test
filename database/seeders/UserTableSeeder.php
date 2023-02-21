<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = Role::where('role_name', "=", Role::ROLE_ADMIN)->first();

        // DB::table('User')->insert([
        //     'username'=> Str::random(10),
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'role_id' => $admin->id,
        // ]);

        User::factory()
            ->count(50)
            ->create();

    }
}
