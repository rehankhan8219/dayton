<?php

namespace Database\Seeders;

use App\Models\Blog;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncate('blogs');

        Blog::create(['name' => 'Home 1']);
        Blog::create(['name' => 'Home 2']);
        Blog::create(['name' => 'About Us 1']);
        Blog::create(['name' => 'About Us 2']);
        Blog::create(['name' => 'Product']);
        Blog::create(['name' => 'Career']);
    }
}
