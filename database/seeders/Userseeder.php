<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class Userseeder extends Seeder
{
   public function run()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt("password")
        ]);

        Profile::create([
            'user_id' => $user->id,
            'bio' => 'Software Developer'
        ]);
    }
}
