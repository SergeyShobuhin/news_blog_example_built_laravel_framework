<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class DeleteController extends BaseController
{
    public function __invoke(Blog $blog)
    {
        $blog->delete($blog);

        return redirect()->route('blog.index');
    }
}
