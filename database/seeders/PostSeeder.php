<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@mail.com',
            'password' => bcrypt("password")
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'First Post',
            'body' => 'This is my first post.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'Second Post',
            'body' => 'This is my second post.'
        ]);
    }
}
