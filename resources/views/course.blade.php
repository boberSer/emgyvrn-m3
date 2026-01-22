@extends('courses')

@section('course')
    <form enctype="multipart/form-data" action="/courses" method="POST">
        @csrf
        <div>
            <label for="name">Course name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="description">Course description</label>
            <input type="text" id="description" name="description">
        </div>
        <div>
            <label for="hours">Course hours</label>
            <input type="number" id="hours" name="hours">
        </div>
        <div>
            <label for="img">Course img</label>
            <input type="file" id="img" name="img">
        </div>
        <div>
            <label for="start_date">Course start date</label>
            <input type="date" id="start_date" name="start_date">
        </div>
        <div>
            <label for="end_date">Course end date</label>
            <input type="date" id="end_date" name="end_date">
        </div>
        <div>
            <label for="price">Course price</label>
            <input type="number" id="price" name="price">
        </div>
        <div>
            <label for="lessons_id">Course lesson id</label>
            <input type="number" id="lessons_id" name="lessons_id">
        </div>
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
    <form action="/courses/{{$course->id}}" method="POST">
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
@endsection
