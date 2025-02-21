<?php



namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Ensure there's at least one user
        $user = User::create([
            'name' => 'User9',
            'email' => 'user9@mail.com',
             'password' => bcrypt("password")
        ]);

        // Create a post with user_id
        $post = Post::create([
            'title' => 'My First Post',
            'body' => 'This is a great post about Laravel.',
            'user_id' => $user->id // Assign a user ID
        ]);

        // Create a video
        $video = Video::create([
            'title' => 'Laravel Tutorial',
            'url' => 'https://example.com/video.mp4'
        ]);

        // Add comments to post
        $post->comments()->create(['body' => 'Great post!']);
        $post->comments()->create(['body' => 'Very helpful, thanks!']);

        // Add comments to video
        $video->comments()->create(['body' => 'Awesome tutorial!']);
    }
}
