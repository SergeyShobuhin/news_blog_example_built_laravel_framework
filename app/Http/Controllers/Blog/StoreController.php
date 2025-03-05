<?php

namespace App\Http\Controllers\Blog;

use App\Http\Requests\Blog\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('blog.index');
    }
}
