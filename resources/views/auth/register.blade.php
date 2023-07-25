<x-layout>
    <!--Register-->
    <div class="contenedor">
        <div class="background_font">
                <!--FORM TITLE-->
                <div class="texting_login">
                    <h2 >{{__('Registrate!') }}</h2>                    
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="position_login">
                <!--FORM FIELDS-->
                <form action="/register" method="POST" role="form">
                    @csrf
                    <!--Name-->
                    <div class="input_down">
                        <input type="text" name="name" id="name" placeholder="{{__('Tu nombre') }}" data-rule="minlen:4" data-msg="Please enter at least 4 chars"><!--si no vale es _ en forms_field-->
                        <div class="validate"></div>
                    <!-- Email-->
                        <input type="email" name="email" id="email" placeholder="{{__('Tu correo') }}" data-rule="minlen:4" data-msg="PLease enter at least 4 chars">
                        <div class="validate"></div>
                    </div>        
                        <hr class="linear">
                    <!--Password-->
                    <div class="input_down">
                        <input type="password" name="password" id="password"  placeholder="{{__('Tu contraseña') }}">
                        <div class="validate"></div>
                    <!--Password Confirmation-->
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{__('Tu contraseña otra vez') }}">
                        <div class="validate"></div>
                        <!-- Button-Register-->
                        <button type="submit">
                            {{__('Registrar') }}
                        </button>
                    <p class="p_position">{{__('¿Ya eres de los nuestros?')}}<a href="{{route('login')}}">{{__('¡Entra ya!')}}</a>
                    </p>             
                    </div>
       
                
                </form>


            
            </div>


        </div>

    </div>

</x-layout>