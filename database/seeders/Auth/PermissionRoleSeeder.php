<?php

namespace Database\Seeders\Auth;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        
        // Create Roles
        Role::create([
            'id' => 1,
            'type' => User::TYPE_ADMIN,
            'name' => 'Administrator',
        ]);

        // Grouped permissions
        // Users category
        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.user',
            'description' => 'Database',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
                'sort' => 6,
            ]),
        ]);

        $blogs = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.blog',
            'description' => 'Blog',
        ]);
        
        $commissions = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.commission',
            'description' => 'Commission',
        ]);

        $calculators = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.risk_calculator',
            'description' => 'Risk Calculator',
        ]);

        $trees = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.grow_tree',
            'description' => 'Grow Tree',
        ]);

        $withdrawals = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.withdrawal',
            'description' => 'Withdrawal',
        ]);

        $bills = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.bill',
            'description' => 'Bill',
        ]);
        
        $inboxes = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.inbox',
            'description' => 'Inbox',
        ]);

        $this->enableForeignKeys();
    }
}
