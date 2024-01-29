<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>
        body {
            background: black;
            box-shadow: 0 -200px 100px -120px yellowgreen inset;
            animation: background 16s infinite alternate;
        }

        @keyframes background {
            50% {
                background: skyblue;
                box-shadow: 0 -200px 100px -100px red inset;
            }
        }

        p {
            font-size: 50px;
            font-family: 'Comic Sans MS', cursive;
            color: pink;
            text-decoration: underline;
        }

        .pp {
            font-family: 'Courier New', monospace;
            color: lawngreen;
            text-transform: uppercase;
        }
    </style>

    <!-- Передается номер дня недели -->
    @php
    $today = \Carbon\Carbon::now();
    $dayNumber = $today->dayOfWeek;
    @endphp

    <!-- Вывод названия дня недели в абзаце -->
    @if($dayNumber === 1)
    <p class="pp">Понедельник</p>
    @elseif($dayNumber === 2)
    <p class="pp">Вторник</p>
    @elseif($dayNumber === 3)
    <p class="pp">Среда</p>
    @elseif($dayNumber === 4)
    <p class="pp">Четверг</p>
    @elseif($dayNumber === 5)
    <p class="pp">Пятница</p>
    @elseif($dayNumber === 6)
    <p class="pp">Суббота</p>
    @else
    <p class="pp">Воскресенье</p>
    @endif

    <!-- Проверка на выходной день (суббота или воскресенье) -->
    @php
    $isWeekend = in_array(date('N', strtotime('today')), [6, 7]); // проверяем, является ли сегодня выходным днем
    @endphp

    @if($isWeekend)
    <p>Сегодня выходной день </p>
    @else
    <p>Рабочий день</p>
    @endif


    @php
    $monthNumber = $monthNumber; // Получаем переданный номер месяца из контроллера
    $season = '';

    if($monthNumber >= 1 || $monthNumber <= 2 || $monthNumber==12) { $season='Зима' ; } elseif($monthNumber>= 3 && $monthNumber <= 5) { $season='Весна' ; } elseif($monthNumber>= 6 && $monthNumber <= 8) { $season='Лето' ; } elseif($monthNumber>= 9 && $monthNumber <= 11) { $season='Осень' ; } else { $season='Номер месяца не соответствует ни одному месяцу' ; } @endphp <p class="pp">{{ $season }}</p>


                    @unless($rndAge > 18 || $rndAge == 18)
                    <p>несовершенный</p>
                    @else
                    @unless($rndAge < 18) <p>совершенный</p>
                        @endunless
                        @endunless
                        <p>{{ $rndAge }}</p>

</body>

</html>