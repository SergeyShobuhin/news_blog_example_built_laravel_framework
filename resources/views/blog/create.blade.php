@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок(title)</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Тут заголовок" value="{{ old('title') }}">
                @error('title')
                <div class="alert alert-danger">Заполни заголовок</div>
                @enderror
            </div>
            <div class="mb-3">
                <select name="description" class="form-select form-select-sm" aria-label=".form-select-sm example" >
                    <option selected>Укажите описание(description)</option>
                    <option value="Зебра">Зебра</option>
                    <option value="Муха">Муха</option>
                    <option value="Космолёт">Космолёт</option>
                </select>
                @error('description')
                <div class="alert alert-danger">Укажи описание</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержимое</label>
                <textarea name="content" class="form-control" id="content" rows="3" >{{ old('content') }}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category">Выберите категорию(category)</label>
                <select name="category_id" id="category" class="form-select" aria-label="Default select example">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? ' selected ' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">Какие теги (tag)</div>
            @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input name="tags[]"
                           class="form-check-input"
                           type="checkbox"
                           id="tags-{{ $tag->id }}"
                           value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tags-{{ $tag->id }}">{{ $tag->title }}</label>
                </div>
            @endforeach

            @error('tags')
            <div class="alert alert-danger">Отметь хотя бы 1 тег</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
