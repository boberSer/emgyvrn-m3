@extends('layout')

@section('title')
    Страница редактирования курса
@endsection

@section('content')
    {{ $course }}
    <span style="display: block; background: #0a0a0a; width: 100%; height: 1px; margin: 15px 0 15px 0"></span>
    <div style="display: flex">
        <div>
            <div style="display: flex">
                <table class="edit-table">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <h2>Редактирование курса: </h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Course name</label>
                            <input type="text" id="name" name="name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description">Course description</label>
                            <input type="text" id="description" name="description">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="hours">Course hours</label>
                            <input type="number" id="hours" name="hours">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="img">Course img</label>
                            <input type="file" id="img" name="img">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="start_date">Course start date</label>
                            <input type="date" id="start_date" name="start_date">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="end_date">Course end date</label>
                            <input type="date" id="end_date" name="end_date">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="price">Course price</label>
                            <input type="number" id="price" name="price">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <h2>Вы находитесь на курсе: </h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Название курса: {{ $course->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Описание курса: {{ $course->description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Количество часов в курса: {{ $course->hours }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img width="300" src="{{asset('storage/' . $course->img)}}" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Начало курса: {{ $course->start_date }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Завершение курса: {{ $course->end_date }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Цена курса: {{ $course->price }}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <span style="display: block; background: #0a0a0a; width: 100%; height: 1px; margin: 15px 0 15px 0"></span>
            <h3>Уроки этого курса: </h3>
            <table class="lessons-table">
                <thead>
                    <tr>
                        <th>Название урока</th>
                        <th>Описание урока</th>
                        <th>Ссылка на видео запись урока</th>
                        <th>Часы урока</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->lessons as $item)
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->video_link }}</td>
                        <td>{{ $item->hours }}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h3>Все уроки: </h3>
            <table>
                <thead>
                    <tr>
                        <th>Название урока</th>
                        <th>Описание урока</th>
                        <th>Ссылка на видео запись урока</th>
                        <th>Часы урока</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lessons as $lesson)
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->description }}</td>
                        <td>{{ $lesson->video_link }}</td>
                        <td>{{ $lesson->hours }}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
