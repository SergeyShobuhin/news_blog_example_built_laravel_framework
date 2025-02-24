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
                <th scope="col">Категории</th>
                <th scope="col" colspan="2">Теги</th>
                {{--            <th scope="col"></th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>{{ $blog->content }}</td>
                    <td>@isset($blog->category->title)
                            {{ $blog->category->title }}
                        @else
                            Категория не указана
                        @endisset
                    </td>
                    <td>@if($blog->tags->isNotEmpty())
                            @foreach($blog->tags as $tag)
                                {{ $tag->title }}
                            @endforeach
                        @else
                            Нет тегов
                        @endif
                    </td>

                    <td><a href="{{ route('blog.show', $blog->id) }}">Смотреть</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('blog.create') }}">Создать статью</a>



@endsection
