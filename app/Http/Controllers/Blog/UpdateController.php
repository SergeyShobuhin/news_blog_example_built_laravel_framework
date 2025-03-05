<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\UpdateRequest;
use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $blog = $this->service->update($blog, $data);

        return new BlogResource($blog);
//        return redirect()->route('blog.show', $blog->id);
    }
}
