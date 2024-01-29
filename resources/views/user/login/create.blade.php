@extends('layouts.layout')
@section('title')
@parent - {{ $title }}
@endsection
@section('content')
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dob'])) {
    // Получаем и очищаем введенную дату рождения
    $dob = htmlspecialchars($_POST["dob"]);

    // Записываем дату рождения в куки
    setcookie('dob', $dob, time() + (86400 * 30), "/");
}
// Проверяем, установлена ли куки с датой рождения

?>
<div class="container">
    <h2 class="mt-5">Авторизация пользователя</h2>
    <form class="mt-5" action="{{ route('login.store') }}" method="POST">
        @csrf


        <!-- Добавьте поле ввода для даты рождения -->
       

        <!-- Другие поля для создания пользователя -->

        
    

    @php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dob'])) {
    // Получаем и очищаем введенную дату рождения
    $dob = htmlspecialchars($_POST["dob"]);
     $dob = date('Y-m-d', strtotime($request->input('dob')));
    // Записываем дату рождения в куки
    setcookie('dob', $dob, time() + (86400 * 30), "/");
    }
    @endphp
    <div class="mb-3 mt-5">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{old('email')}}">
    </div>

    <div class="mb-3 mt-5">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" value="">
    </div>
    <div class="mb-3 mt-5">
            <label for="dob">Дата рождения:</label><br>
            <input type="date" id="dob" name="dob"><br><br>
        </div>

    <button type="submit" class="btn btn-danger">Отправить</button>
    </form>
</div>

@endsection