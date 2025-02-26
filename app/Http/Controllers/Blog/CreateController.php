<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('blog.create', compact('tags', 'categories'));
    }
}
