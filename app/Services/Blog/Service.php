<?php

namespace App\Services\Blog;

use App\Models\Blog;

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

}
