<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        $tags = Tag::factory(3)->create();
        $blogs = Blog::factory(100)->create();

        foreach ($blogs as $blog) {
            $randKey = rand(1,3);
            $tagIds = $tags->random($randKey)->pluck('id');
            $blog->tags()->attach($tagIds);
        }

        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
