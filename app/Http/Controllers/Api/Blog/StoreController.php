<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $blog = $this->service->store($data);

        return new BlogResource($blog);
    }
}
