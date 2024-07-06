<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed departments and Standard User staff
        Department::factory(5)->create()->each(function ($department) {
            Staff::factory(10)->create(['depId' => $department->depId])->each(function ($staff) {
                $user = User::factory()->create(['staffId' => $staff->staffId]);

                $role = Role::where('name', 'Standard User')->first();
                $user->roles()->attach($role);
            });
        });

        // Seed specific users
        $this->seedSpecificUsers();
    }

    private function seedSpecificUsers(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superAdmin@example.com',
                'role' => 'Super Admin',
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@example.com',
                'role' => 'Manager',
            ],
            [
                'name' => 'Standard User',
                'email' => 'standardUser@example.com',
                'role' => 'Standard User',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::where('email', $userData['email'])->first();

            if (!$user) {
                $user = User::factory()->create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => Hash::make('123456'),
                ]);
            }

            $role = Role::where('name', $userData['role'])->first();
            if ($role && !$user->roles->contains($role)) {
                $user->roles()->attach($role);
            }
        }
    }
}
