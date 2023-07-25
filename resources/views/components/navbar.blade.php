<nav class="position" >
      <h2> <a  aria-expanded="false" href="{{ route('home') }}">Vendotutto</a></h2>
    
      <ol class="position_nav">
        <li >
          <a href="{{ route('ads.create') }}">{{ __('Crear anuncio') }}</a>
        </li>
        <li >
            <a role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __('Categorías') }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)              
                          <li><a class="dropdown-item" href="{{ route('category.ads',$category)}}">{{$category->name}}</a></li>
                        @endforeach
            </ul>
        </li>
          
        <li>
                  @guest
            @if (Route::has('login'))
                <li >
                  <a class="nav-link" href="{{ route('login') }}">
                    <span>Entrar</span>
                  </a>
                </li>
            @endif
              @if (Route::has('register'))
                  <li>
                    <a href="{{ route('register') }}">
                    <span>Registrar</span></a>
                  </li>
              @endif
              @else
              <li >
                <a  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if(Auth::user()->is_revisor)
                  <li>
                    <a class="dropdown-item" href="{{ route('revisor.home') }}">
                    Revisor
                    <span class="badge rounded-pill bg-danger">
                      {{ \App\Models\Ad::ToBeRevisionedCount()}}
                    </span>
                    </a>
                  </li>
                  @endif
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
                </form>
                <li class="salir_position">
                   <a id="logoutBtn" class="nav-link" href="#">Salir</a>
                </li>
               
                </ul>
               
              </li>
            @endguest
        </li>
        <li class="banderitas">
            <li>
              <x-locale lang="en" country="gb"/>
            </li>
            <li>
              <x-locale lang="it" country="it"/>
            </li>
            <li>
              <x-locale lang="es" country="es"/>
            </li>
        </li>
        <li>
          <form action="{{ route('search') }}" method="GET" role="search">
          <input type="search" placeholder="search" name="q" aria-label="search">
          <button type="submit"><i class="bi-search"></i></button>
        </form>
        </li>
        
      </ol>
</nav>