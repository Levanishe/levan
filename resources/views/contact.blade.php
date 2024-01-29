    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('isp222')}}" method="post">
        @csrf
        <input type="text" name="name" id="">
        <input type="email" name="email" id="">
        <button type="submit">Отправить</button>
    </form>
</body>
</html>