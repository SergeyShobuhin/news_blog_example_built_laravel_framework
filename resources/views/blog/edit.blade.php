@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('blog.update', $blog->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input name="title" type="text" class="form-control" id="title"
                       value="{{ old('title', $blog->title) }}">
            </div>
            <div class="mb-3">
                <select name="description" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="{{ $blog->description }}" selected>{{ $blog->description }}</option>
                    <option value="Зебра" {{ old('description', $blog->description) == 'Зебра' ? 'selected' : '' }}>
                        Зебра
                    </option>
                    <option value="Муха" {{ old('description', $blog->description) == 'Муха' ? 'selected' : '' }}>Муха
                    </option>
                    <option
                        value="Космолёт" {{ old('description', $blog->description) == 'Космолёт' ? 'selected' : '' }}>
                        Космолёт
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержимое</label>
                <textarea name="content" class="form-control" id="content" rows="3">{{ $blog->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category">Выберите категорию(category)</label>
                <select name="category_id" id="category" class="form-select" aria-label="Default select example">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $blog->category_id ? ' selected ' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @if($tags->isEmpty())
                <div class="alert alert-info">Теги отсутствуют.</div>
            @else
                <div class="mb-3">Отметь теги (tags):
                    @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input name="tags[]"
                                   class="form-check-input"
                                   type="checkbox"
                                   id="tags-{{ $tag->id }}"
                                   value="{{ $tag->id }}"
                                {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label mb-1" for="tags-{{ $tag->id }}">{{ $tag->title }}</label>
                        </div>
                    @endforeach
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
