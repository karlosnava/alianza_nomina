<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Alianza Nómina</title>
    
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d267b61a05.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('partials.navbar')
    
    <div class="w-11/12 md:w-6/12 mx-auto my-10">
        @auth
            @if (auth()->user()->role_id > 1)
                @include('partials.links')
            @endif
        @endauth
        
        @yield('content')
    </div>

    @livewireScripts
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>
</html>