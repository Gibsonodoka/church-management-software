<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Roles
        $this->call(RoleSeeder::class);

        // Seed Admin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@newheavenph.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $admin->roles()->attach(Role::where('name', 'Admin')->first());

        // Seed Senior Pastor User
        $pastor = User::create([
            'name' => 'Senior Pastor',
            'email' => 'pastor@newheavenph.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $pastor->roles()->attach(Role::where('name', 'Senior Pastor')->first());
    }
}