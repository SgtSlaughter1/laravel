<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainee Network</title>

    @vite('resources/css/app.css')
</head>

<body>

    <header>
        <nav>
            <h1>
                <a href="{{route('trainees.home')}}"> Trainee Network</a>
            </h1>
            <a href="{{route('trainees.index')}}">All Trainee</a>
            {{-- <a href="{{route('trainees.create')}}"> Create Trainee</a> --}}
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
</body>

</html>
