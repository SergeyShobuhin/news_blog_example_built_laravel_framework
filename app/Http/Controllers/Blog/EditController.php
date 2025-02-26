<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.edit', compact('blog', 'categories', 'tags'));
    }
}
