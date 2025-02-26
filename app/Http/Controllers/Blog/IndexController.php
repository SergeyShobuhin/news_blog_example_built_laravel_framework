<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke()
    {

        $blogs = Blog::paginate(5);
        $categories = Category::all();
        $tag = Tag::all();

        return view('blog.index', compact('blogs', 'categories', 'tag'));
    }
}
