<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $this->service->update($blog, $data);

        return redirect()->route('blog.show', $blog->id);
    }
}
