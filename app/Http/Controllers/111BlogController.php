<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        $tag = Tag::all();

        return view('blog.index', compact('blogs', 'categories', 'tag'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
//        dd($tags);

        return view('blog.create', compact('tags', 'categories'));
    }

    public function store()
    {
//        dd(request()->validate([]));
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => 'required|array|min:1',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $blog = Blog::create($data);
        $blog->tags()->attach($tags);

        return redirect()->route('blog.index');
    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.edit', compact('blog', 'categories', 'tags'));
    }

    public function update(Blog $blog)
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => '',
//            'tags.*' => 'exists:tags,id',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

//        dd($tags);

        $blog->update($data);
        $blog->tags()->sync($tags);

        return redirect()->route('blog.show', $blog->id);
    }

    public function delete(Blog $blog)
    {
        $blog->delete($blog);

        return redirect()->route('blog.index');
    }

    public function firstOrCreate()
    {
        $updateBlog = [
            'title' => 'qqqqqqqqqqqqqqq',
            'content' => 'qqqqqqqqqqq qqqqqqqqqqqq qqq q qqqqqqqq',
            'tag' => 'qq'
        ];

        $blog = Blog::firstOrCreate([
            'title' => 'aaaaaaaaaaaa qqqqqqqqqqqqqqq'
        ], [
            'title' => 'aaaaaaaaaaaa qqqqqqqqqqqqqqq',
            'content' => 'zzzzzzzzzzzzzzz',
            'tag' => 'lklklk'
        ]);
        dump($blog->content);
        dd('qwe');
    }

    public function updateOrCreate()
    {
        $updateBlog = [
            'title' => 'aaaaaaaaaaaa qqqqqqqqqqqqqqq',
            'content' => 'aaaaaaaaaaaa qqaaaaaaaaaaaaaa',
            'tag' => 'aaaaaaa'
        ];

        $blog = Blog::updateOrCreate([
            'title' => '111 czc'
        ], [
            'title' => '1111 aaaaaaaaaaaa qqqqqqqqqqqqqqq',
            'content' => '1111 aaaaaaaaaaaa qqaaaaaaaaaaaaaa',
            'tag' => '1111 aaaaaaa'
        ]);
        dump($blog->title);
        dd('updateOrCreate');
    }
}
