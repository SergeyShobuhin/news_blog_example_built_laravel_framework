@extends('layouts.main')
@section('content')
<div>
    <table class="table table-success table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">описание</th>
            <th scope="col">Текст</th>
            <th scope="col">Категория</th>
            <th scope="col" colspan="6">Теги</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $blog->id }}</th>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->description }}</td>
            <td>{{ $blog->content }}</td>
            <td>@isset($blog->category->title)
                    {{ $blog->category->title }}
                @else
                    Теги отсутствуют
                @endisset
            </td>
            <td>@isset($blog->tag->title)
                    {{ $blog->tag->title }}
                @else
                    Категория не указана
                @endisset
            </td>
            <td><a class="btn btn-primary" href="{{ route('blog.edit', $blog->id) }}">изменить</a></td>
            <td><form action="{{ route('blog.delete', $blog->id) }}" method="post" class="btn btn-primary">
{{--            <a class="btn btn-primary" href="{{ route('blog.delete', $blog->id) }}">удалить</a></td>--}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning">удалить</button>
                </form></td>
        </tr>
        </tbody>
    </table>
</div>
<a class="btn btn-primary" href="{{ url('blogs') }}">Вернуться к блогам</a>

@endsection
