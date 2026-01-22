@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <th>Имя курса</th>
            <th>Описание курса</th>
            <th>Часы курса</th>
            <th>Картинка курса</th>
            <th>Начало курса</th>
            <th>Конец курса</th>
            <th>Цена курса</th>
            <th>
                {{ $courses->links() }}
{{--                {{ $paginate }}--}}
            </th>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->hours }}</td>
                    <td>
                        <img width="200" src="{{'storage/' . $course->img}}" alt="">
                    </td>
                    <td>{{ $course->start_date }}</td>
                    <td>{{ $course->end_date }}</td>
                    <td>{{ $course->price }}</td>
                    <td>
                        <form action="/course/{{$course->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить курс</button>
                        </form>
                    </td>
                    <td>
                        <form action="/course/{{$course->id}}" method="POST">
                            @csrf
                            <button type="submit">Изменить курс</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        @yield('course')
    </div>

@endsection
