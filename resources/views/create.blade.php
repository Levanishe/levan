@extends('layouts.layout')

@section('title')
@parent - {{ $title }}
@endsection

@section('content')

<div class="container">
    <!-- <div class="mt-5">
        <h1>Create Post</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div> -->

    <form class="mt-5" action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="mb-3 mt-5">

            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{old('title')}}">
        </div>

        <div class="mb-3">
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5"> {{old('content')}} </textarea>
        </div>
            @error('rubric_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <select class="form-select mb-3 @error('rubric_id') is-invalid @enderror" id="rubric_id" name="rubric_id">

            <option selected>Выберите рубрику</option>
            @foreach ($rubrics as $key => $value)
            <option value="{{ $key }}" @if(old('rubric_id')==$key) selected @endif> {{ $value }} </option>
            @endforeach
        </select>
        
        <button type="submit" class="btn btn-danger">Отправить</button>
    </form>
</div>

@endsection


<!-- - Создайте маршрут с URL-адресом /enter, который будет отображать форму для пользователя.
  - Создайте соответствующий метод в контроллере EnterController для обработки отправки формы.
  - Реализуйте валидацию входящих данных для имени пользователя, электронной почты, номер телефона. 
- Убедитесь, что поля заполнены и удовлетворяют определенным правилам (например, длина строки, формат электронной почты и т.д.).
  - Если данные прошли валидацию успешно, сохраните данные пользователя в базе данных и выдайте соответствующее сообщение.
  - Если данные не прошли валидацию, верните пользователя на страницу с формой отображением соответствующих ошибок. -->
