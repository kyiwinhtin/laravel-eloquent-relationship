<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;


// One to One
// Route::get('/', function () {
    // Get the profile of a user:
    // $user = User::find(1);
    // echo $user->profile->bio ."<br>";
    // Get the user of a profile:
    // $profile = Profile::find(1);
    // echo $profile->user->name;

    // Step 5: Insert Data with Relationship
    // $user = User::create(['name' => 'Alice', 'email' => 'alice@example.com']);
    // $profile = new Profile(['bio' => 'Web Designer']);
    // $user->profile()->save($profile);

    // Step 6: Update & 
    // $user = User::find(1);
    // $user->profile->bio = 'Updated Bio';
    // $user->profile->save();

    // Delete
    // $user->profile->delete();


// });

// One to Many
// Route::get('/',function(){
    // Get All Posts of a User
    // $user = User::find(3);
    // foreach ($user->posts as $post) {
    //     echo $post->title . "<br>";
    // }
    // Get the User of a Post
    // $post = Post::find(1);
    // echo $post->user->name;

    // Create a Post for a User
    // $user = User::find(1);
    // $post = new Post([
    //     'title' => 'New Post',
    //     'body' => 'This is a new post.'
    // ]);
    // $user->posts()->save($post);

    // Update a Post
    // $post = Post::find(1);
    // $post->title = 'Updated Title';
    // $post->save();

    // Delete a Post
    // $post->delete();
    // Delete a User (Cascade will delete all posts)
    // $user->delete();


// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
