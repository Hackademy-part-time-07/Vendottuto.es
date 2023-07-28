<x-layout>
<x-slot name='title'></x-slot>
    <main class="main">
        <div class="position_text">
            <h1>{{__('messages.welcome')}}</h1>
        </div>
        <section>      
                @forelse ($ads as $ad)
                       <div class="body_card">
                                @if ($ad->images()->count() > 0)
                                <img src="{{ $ad->images()->first()->getUrl(400,300) }}" class="card-img-top" alt="...">
                                @else
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                @endif
                            <div class="text_down">
                                <h5> 
                                    <b>{{ $ad->title }} </b>
                                </h5>
                                <h6>
                                    <b>${{ $ad->price }} </b>
                                </h6>
                                <button>
                                    <a href="{{ route("ads.show", $ad) }}">{{ __('Mostrar') }}</a>
                                </button>                                
                            </div>     

                    
                        </div>
                @empty
                <div>
                    <h2>{{ __('Parece que no hay nada de esta categoria') }}</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-success">{{ __('Vende tu primer objeto') }}</a></a> o
                    <a href="{{ route('home') }}">{{ __('Vuelve a la home') }}</a>
                
                @endforelse
                
        </section>

    </main>
</x-layout>