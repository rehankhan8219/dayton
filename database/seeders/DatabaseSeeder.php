<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\Traits\TruncateTable;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();

        $this->truncateMultiple([
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(BlogSeeder::class);

        Model::reguard();
    }
}
