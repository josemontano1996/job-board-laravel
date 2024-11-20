<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ $title ?? "Job Board Laravel" }}</title>

        @vite("resources/css/app.css")
        @vite("resources/js/app.js")

        {{ $head ?? null }}
    </head>

    <body
        class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90%"
    >
        <nav class="mb-8 flex items-center justify-between font-medium">
            <ul class="flex space-x-2 text-lg">
                <li><a href="{{ route("jobs.index") }}">Home</a></li>
            </ul>
            <ul class="flex items-center space-x-2 text-sm">
                @auth
                    <li>
                        {{ auth()->user()->name }}
                    </li>
                    <span>|</span>
                    <li>
                        <form
                            action="{{ route("auth.destroy") }}"
                            method="POST"
                        >
                            @csrf
                            @method("DELETE")
                            <button>Log out</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route("auth.create") }}">Sign in</a></li>
                @endauth
            </ul>
        </nav>
        {{ $slot }}
    </body>
</html>
