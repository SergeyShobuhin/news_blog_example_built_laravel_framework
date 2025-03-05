<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class DeleteController extends BaseController
{
    public function __invoke(Blog $blog)
    {
        $blog->delete($blog);
    }
}
