<h3>Example:</h3>

  <h3>A User has one Profile.</h3>  
   <h3> A Profile belongs to one User.</h3>

   
   // Get the profile of a user:

   
    $user = User::find(1);
    
    echo $user->profile->bio ."<br>";
    
    // Get the user of a profile:
    $profile = Profile::find(1);
    echo $profile->user->name;

    // Step 5: Insert Data with Relationship
    $user = User::create(['name' => 'Alice', 'email' => 'alice@example.com']);
    $profile = new Profile(['bio' => 'Web Designer']);
    $user->profile()->save($profile);

    // Step 6: Update & 
    $user = User::find(1);
    $user->profile->bio = 'Updated Bio';
    $user->profile->save();

    Delete
    $user->profile->delete();
