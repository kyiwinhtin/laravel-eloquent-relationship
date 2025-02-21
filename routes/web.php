<?php

use App\Http\Controllers\ProfileController;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Get the profile of a user:
    $user = User::find(1);
    echo $user->profile->bio ."<br>";
    // Get the user of a profile:
    $profile = Profile::find(1);
    echo $profile->user->name;

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


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
