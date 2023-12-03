<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $slug = rtrim(strtolower(join('-', explode(' ', $title))), '.');
        $content = collect(fake()->paragraphs(8))->map(fn ($p) => "<p>$p</p>")->implode('');

        return [
            "user_id" => "1",
            "category_id" => mt_rand(1, 3),
            "title" => $title,
            "slug" => $slug,
            "content" => $content,
            "image" => ""
        ];
    }
}
