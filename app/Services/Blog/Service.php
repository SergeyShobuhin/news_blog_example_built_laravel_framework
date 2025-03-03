<?php

namespace App\Services\Blog;

use App\Models\Blog;
use App\Models\Category;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $blog = Blog::create($data);
        $blog->tags()->attach($tags);

    }

    public function update($blog, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $blog->update($data);
        $blog->tags()->sync($tags);
    }

    public function filterCategory($data)
    {
        if (!empty($data['category'])) {
            $category = Category::where('title', $data['category'])->first();
            $data['category_id'] = $category ? $category->id : null;
            unset($data['category']);
        }
        return $data;
    }

}
