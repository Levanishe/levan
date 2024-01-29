@extends('layouts.layout')
<?php

if (!isset($_COOKIE['last_visit'])) {
  $time = time();
  setcookie('last_visit', $time, time() + (86400 * 30), "/"); // кука действует 30 дней
} else {
  $lastVisit = $_COOKIE['last_visit'];
  $currentTime = time();
  $timeDiff = $currentTime - $lastVisit;
  echo "Прошло " . $timeDiff . " секунд с предыдущего захода на сайт.";
  setcookie('last_visit', $currentTime, time() + (86400 * 30), "/"); // обновляем куку с текущим временем
}



?>

@if (isset($_COOKIE['dob']))
    @php
        $dob = $_COOKIE['dob'];
    @endphp

    @if (date('m-d') == date('m-d', strtotime($dob)))
        <p>С днем рождения!</p>
    @else
        <p>Сегодня не ваш день рождения. Ждем вас в следующий раз!</p>
    @endif
@else
    <p>Введите вашу дату рождения.</p>
@endif

@section('title')
  @parent - {{ $title }}
@endsection

@section('header')
@parent

@endsection


@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p>Вы посетили эту страницу {{ $counter }} раз.</p>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
</section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @foreach ($posts as $post)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <p class="card-text"> {{ $post->content }} </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted"> {{$post->getDate()}} </small>
              </div>
            </div>
          </div>
        </div>
    @endforeach

      </div>
    </div>
  </div>
@endsection