<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Users
        $user1 = User::create(['name' => 'John Doe', 'email' => 'john@gmail.com','password' => bcrypt("password")]);
        $user2 = User::create(['name' => 'Alice Smith', 'email' => 'alice@example.com','password' => bcrypt("password")]);

        // Create Roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Editor']);

        // Attach roles to users
        $user1->roles()->attach([$role1->id, $role2->id]); // John has Admin and Editor roles
        $user2->roles()->attach([$role2->id]); // Alice has Editor role only
    }
}
