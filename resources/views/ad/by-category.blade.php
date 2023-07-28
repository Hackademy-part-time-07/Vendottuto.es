<x-layout>
        <x-slot name='title'></x-slot> 
      
<main class="main">
                <div class="texting_category">
                    <h1>Anuncios por categoría: {{ $category->name }}</h1>
                </div>
            <section>
                    @forelse ($ads as $ad)
                        <div class="categories_card">
                                @if ($ad->images()->count() > 0)
                                <img src="{{Storage::url($ad->images()->first()->path)}}" class="card-img-top" alt="...">
                                @else
                                <img src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://climate.onep.go.th/wp-content/uploads/2020/01/default-image.jpg' }}" alt="..." class="card-img-top">
                                @endif
                            <div class="text_down">
                                <h5 class="card-title">{{ $ad->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">${{ $ad->price }}</h6>
                                <div class="card-subtitle mb-2">
                                    <strong><a href="{{ route('category.ads', $ad->category) }}">{{ $category->name }}</a></strong>
                                </div>
                                <button>
                                <a href="{{ route("ads.show", $ad) }}">Mostrar Más</a>
                                </button>
                            </div>
                        </div>
                
                    @empty
                    <div class="position_paginate">
                        <h2>Uyy.. parece que no hay nada de esta categoría</h2>
                        <a href="{{ route('ads.create') }}" class="btn btn-success">Vende tu primer objeto'</a>  o  <a href="{{ route('home') }}" class="btn btn-primary">Vuelve a la Home</a>
                    </div>
                @endforelse
            
            </section>
         
            <div class="position_paginate">
                {{$ads->links()}}
         </div>           

</main>

        
</x-layout>