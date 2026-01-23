@extends('layout')

@section('title')
    <h1>Страница курсов</h1>
    <a>Перейти на страницу уроков каждого курса</a>
@endsection
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Имя курса</th>
            <th>Описание курса</th>
            <th>Часы курса</th>
            <th>Картинка курса</th>
            <th>Начало курса</th>
            <th>Конец курса</th>
            <th>Цена курса</th>
            <th colspan="2" class="pagination-container">
                {{ $courses->links() }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->hours }}</td>
                <td>
                    <img width="200" src="{{'storage/' . $item->img}}" alt="">
                </td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <form action="/courses/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{ $item->id }}
                        <button type="submit">Удалить курс</button>
                    </form>
                </td>
                <td>
                    <form action="/courses/{{$item->id}}/edit-course" method="GET">
                        @csrf
                        <button type="submit">Изменить курс</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <span style="display: block; background: #0a0a0a; width: 100%; height: 1px; margin: 15px 0 15px 0"></span>
    <div>
        <form enctype="multipart/form-data" action="/courses" method="POST">
            @csrf
            <table>
                <tbody>
                <td>
                    <label for="name">Course name</label>
                    <input type="text" id="name" name="name">
                </td>
                <td>
                    <label for="description">Course description</label>
                    <input type="text" id="description" name="description">
                </td>
                <td>
                    <label for="hours">Course hours</label>
                    <input type="number" id="hours" name="hours">
                </td>
                <td>
                    <label for="img">Course img</label>
                    <input type="file" id="img" name="img">
                </td>
                <td>
                    <label for="start_date">Course start date</label>
                    <input type="date" id="start_date" name="start_date">
                </td>
                <td>
                    <label for="end_date">Course end date</label>
                    <input type="date" id="end_date" name="end_date">
                </td>
                <td>
                    <label for="price">Course price</label>
                    <input type="number" id="price" name="price">
                </td>
                </tbody>
            </table>
            <button type="submit">send</button>
        </form>
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($course))
            {{ $course->id }}
            <form action="/courses/{{$course->id}}" method="POST">
                @csrf
                @method("DELETE")
                <p>Новый созданный курс:</p>
                <ul>
                    <li>Название курса: {{ $course->name }}</li>
                    <li>Описание курса: {{ $course->description }}</li>
                    <li>Количество часов в курсе: {{ $course->hours }}</li>
                    <li><img width="300" src="{{ asset('storage/' . $course->img) }}" alt=""></li>
                    <li>Стоимость курса: {{ $course->price }}</li>
                    <li>Начало курса: {{ $course->start_date }}</li>
                    <li>Конец курса: {{ $course->end_date }}</li>
                </ul>
                <button type="submit">Удалить курс</button>
            </form>
        @endif
    </div>

@endsection
