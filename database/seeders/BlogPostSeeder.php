<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                "title" => "Post 1",
                "slug" => "post-1",
                "content" => "Content 1",
                "image" => "image-1.jpg",
                "status" => 1,
                "blog_category_id" => 1,
            ],
            [
                "title" => "Post 2",
                "slug" => "post-2",
                "content" => "Content 2",
                "image" => "image-2.jpg",
                "status" => 1,
                "blog_category_id" => 2,
            ],
            [
                "title" => "Post 3",
                "slug" => "post-3",
                "content" => "Content 3",
                "image" => "image-3.jpg",
                "status" => 1,
                "blog_category_id" => 3,
            ],
            [
                "title" => "Post 4",
                "slug" => "post-4",
                "content" => "Content 4",
                "image" => "image-4.jpg",
                "status" => 1,
                "blog_category_id" => 4,
            ],
            [
                "title" => "Post 5",
                "slug" => "post-5",
                "content" => "Content 5",
                "image" => "image-5.jpg",
                "status" => 1,
                "blog_category_id" => 5,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
