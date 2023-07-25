<x-layout>
<x-slot name="title">Vendotutto - {{__('Iniciar sesión') }}</x-slot>
        <div class="background_font" >
                <div class=" texting_login">
                    <h2>{{__('Iniciar sesión') }}</h2>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <div class="position_body">
                <form action="/login" method="POST" role="form" >
                    @csrf
                    <div class="input_down">
                        <input type="email" name="email" id="email"  placeholder="{{__('Tu correo') }}" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>

                        <input type="password" name="password" id="password" placeholder="{{__('Tu contraseña') }}">
                        <div class="validate"></div>
                    </div>
                    <div class="input_down">
                        <button class="" type="submit">{{__('Entrar') }}
                        </button>

                    </div>
                        <hr class="linear2" >
                    <p class="p_position">{{__('¿Aún no eres de los nuestros?') }} <a href="{{ route('register') }}">{{__('Registrate!') }}</a>
                    </p>
                </form>
            </div>        
        </div>


</x-layout>