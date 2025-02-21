<?php

use App\Http\Controllers\ProfileController;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\Video;
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

// Many to Many
// Route::get('/',function(){
    // Get All Roles of a User
    // $user = User::find(8);
    // foreach ($user->roles as $role) {
    //     echo $role->name . "<br>";
    // }
    // Get All Users of a Role
    // $role = Role::find(1);
    // foreach ($role->users as $user) {
    //     echo $user->name . "<br>";
    // }
    // Attach a Role to a User
    // $user = User::find(9);
    // $user->roles()->attach(2); // Adds Role ID 2 to the user
    // foreach($user->roles as $role) 
    // {
    //     echo $role->name ."<br>";
    // }
    // Detach a Role from a User
    // $user = User::find(9);
    // $user->roles()->detach(2);  // Removes Role ID 2 from the user
    //   foreach($user->roles as $role) 
    // {
    //     echo $role->name ."<br>";
    // }
    // Sync (Attach & Remove Roles)
    // $user->roles()->sync([1, 3]);

    // Update & Delete
    // $role = Role::find(1);
    // $role->name = 'Super Admin';
    // $role->save();

    // Delete a Role (Removes from Pivot Table Too)
    // $role->delete();

    // Delete a User (Cascade will remove from Pivot Table)
    // $user->delete();

    // Polymorphic Relationship
    Route::get('/',function(){
        // Get All Comments for a Post
        // $post = Post::find(3);
        // foreach ($post->comments as $comment) {
        //     echo $comment->body . "<br>";
        // }
        // Get All Comments for a Video
        // $video = Video::find(1);
        // foreach ($video->comments as $comment) {
        //     echo $comment->body . "<br>";
        // }
        // Get the Parent of a Comment (Post or Video)
        // $comment = Comment::find(1);
        // echo $comment->commentable->title; // Works for both posts and videos

        // Step 5: Insert Data with Relationship
            // Create a Comment for a Post
        // $post = Post::find(1);
        // $post->comments()->create(['body' => 'Nice post!']);

        // Create a Comment for a Video
        // $video = Video::find(1);
        // $video->comments()->create(['body' => 'Awesome video!']);

        // Update & Delete
        // $comment = Comment::find(1);
        // $comment->body = 'Updated Comment';
        // $comment->save();

        // Delete a Comment
        // $comment->delete();

        // Delete a Post or Video (Cascade will delete comments)
        // $post->delete();  // Deletes post and its comments
        // $video->delete(); // Deletes video and its comments


    });


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
