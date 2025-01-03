<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use App\Models\Feature;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => RolesEnum::User->value]);
        $commentorRole = Role::create(['name' => RolesEnum::Commentor->value]);
        $adminRole = Role::create(['name' => RolesEnum::Admin->value]);

        $manageFeaturesPermission = Permission::create([
            'name' => PermissionsEnum::ManageFeatures->value,
            ]);
        $manageCommentsPermission = Permission::create([
            'name' => PermissionsEnum::ManageComments->value,
        ]);
        $manageUsersPermission = Permission::create([
            'name' => PermissionsEnum::ManageUsers->value,
        ]);
        $upvotedownvotePermission = Permission::create([
            'name' => PermissionsEnum::UpvotesDownVotes-> value,
        ]);

        $userRole->syncPermissions([$upvotedownvotePermission]);
        $commentorRole->syncPermissions([$upvotedownvotePermission, $manageCommentsPermission]);
        $adminRole->syncPermissions([
            $upvotedownvotePermission,
            $manageUsersPermission,
            $manageCommentsPermission,
            $manageUsersPermission,
        ]);
        User::factory()->create([
            'name' => 'User User',
            'email' => 'User@example.com',
        ])->assignRole(RolesEnum::User);
        User::factory()->create([
            'name' => 'Commentor User',
            'email' => 'Commentor@example.com',
        ])->assignRole(RolesEnum::Commentor);
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'Admin@example.com',
        ])->assignRole(RolesEnum::Admin);
        Feature::factory(100)->create();
    }
}
