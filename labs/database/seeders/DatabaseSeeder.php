<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected $model = Post::class;
    public function run(): array
    {
        return [
            'title' => fake()->text(100),
            'body' => fake()->paragraph(),
            'enabled' => fake()->boolean,
            'published_at' => fake()->dateTime(),
        ];
    }
}
