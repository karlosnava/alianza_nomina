<nav class="bg-black py-3">
    <div class="flex items-center justify-between w-11/12 md:w-6/12 mx-auto">
        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>

        <div class="text-white flex items-center justify-between">
            @auth
                <div class="font-bold mr-5">
                    {{ auth()->user()->first_name . " " . auth()->user()->first_surname }}
                    <div class="text-xs text-right">
                        @if (auth()->user()->role_id == 1)
                            Empleado
                        @endif
                        @if (auth()->user()->role_id == 2)
                            Personal de nómina
                        @endif
                        @if (auth()->user()->role_id == 3)
                            Presidente
                        @endif
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs text-red-500">Cerrar sesión</button>
                </form>
            @endauth
        </div>
    </div>
</nav>