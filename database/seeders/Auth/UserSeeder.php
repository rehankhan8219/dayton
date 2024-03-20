<?php

namespace Database\Seeders\Auth;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'username' => 'superadmin',
            'password' => 'Secret@123',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        // if (app()->environment(['local', 'testing'])) {
        //     User::create([
        //         'type' => User::TYPE_USER,
        //         'name' => 'Test User',
        //         'email' => 'user@user.com',
        //         'password' => 'Secret@123',
        //         'email_verified_at' => now(),
        //         'active' => true,
        //     ]);
        // }

        $this->enableForeignKeys();
    }
}
