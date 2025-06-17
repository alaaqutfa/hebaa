<?php
namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => Article::inRandomOrder()->first()?->id ?? Article::factory(),
            'user_id'    => User::inRandomOrder()->first()?->id, // أو null لو كان التعليق زائر
            'name'       => $this->faker->name(),
            'comment'    => $this->faker->paragraph(),
        ];
    }
}
