<?php

namespace App\Http\Controllers\Blog;

use App\Http\Filters\BlogFilter;
use App\Http\Requests\Blog\FilterRequest;
use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $data = $this->service->filterCategory($data);

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 5;

        $filter = app()->make(BlogFilter::class, ['queryParams' => array_filter($data)]);
        $blogs = Blog::filter($filter)->paginate($perPage, ['*'], 'page', $page);
//        $blogs = Blog::filter($filter)->get();
//        dump($blogs);

        $categories = Category::all();
        $tags = Tag::all();
//        dump($categories);
//        dd($tags);

        return BlogResource::collection($blogs);

        return view('blog.index', compact('blogs', 'categories', 'tags'));
    }
}
