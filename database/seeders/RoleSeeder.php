<?php
namespace Database\Seeders;

use App\Models\Roles;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing roles
        DB::table('roles')->delete();

        // Ensure there's at least one user
        $user = Users::first();

        if (!$user) {
            $user = Users::create([
                'id' => (string) \Illuminate\Support\Str::uuid(), // Optional, if your Users table uses UUIDs
                'firstName' => 'Default Admin',
                'email' => 'admin@example.com',
                'password' => 12345678, // Update password as needed
            ]);
        }

        // Define roles
        $roles = [
            [
                'id' => 'ff635a8f-4bb3-4d70-a3ed-c7749030696c',
                'isDeleted' => 0,
                'name' => 'Employee',
                'createdBy' => $user->id,
                'modifiedBy' => $user->id,
                'createdDate' => Carbon::now(),
                'modifiedDate' => Carbon::now(),
            ],
            [
                'id' => 'f8b6ace9-a625-4397-bdf8-f34060dbd8e4',
                'isDeleted' => 0,
                'name' => 'Super Admin',
                'createdBy' => $user->id,
                'modifiedBy' => $user->id,
                'createdDate' => Carbon::now(),
                'modifiedDate' => Carbon::now(),
            ],
        ];

        // Insert roles into the database
        Roles::insert($roles);
    }
}
