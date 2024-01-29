@extends('layouts.layout')
@section('title')
@parent - {{ $title }}
@endsection
@section('content')
<div class="container">
    <h2 class="mt-5">Регистрация пользователя</h2>
    <form class="mt-5" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-5">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{old('name')}}">
        </div>

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
            <label for="password_confirmation" class="form-label">Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" value="">
        </div>

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control-file">
        </div>


        <button type="submit" class="btn btn-danger">Отправить</button>
    </form>
</div>

@endsection