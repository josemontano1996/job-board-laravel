<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Job Board Laravel'}}</title>

    @vite('resources/css/app.css')

    {{$head ?? null}}
</head>

<body class="mx-auto mt-10 max-w-2xl">
    {{$slot}}
</body>

</html>
