<x-layout>
    <x-slot name='title'></x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>'Últimos anuncios'</h1>
            </div>
        </div>
        <div class="row">
            @forelse ($ads as $ad)
            <div class="col-12 col-md-4">
                <div class="card mb-5 anuncios">
                    <img src="https://via.placeholder.com/150" alt="..." class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"> <b>Titulo: </b>{{ $ad->title }}</h5>
                        <h6 class="card-subtitle mb-2"><b>Precio:</b>{{ $ad->price }}</h6>
                        <p class="card-text"><b>Descripcion:</b>{{ $ad->body }}</p>
                        <div class="card-subtitle mb-2">
                            <strong>
                                <a href="{{ route("category.ads", $ad->category) }}">#{{ $ad->category->name }}</a>
                            </strong>
                            <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                        </div>
                        <div class="card-subtitle mb-2">
                            <small>{{ $ad->user->name }}</small>
                        </div>
                        <a class="btn btn-primary" href="{{ route("ads.show", $ad) }}">Mostrar Más</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>Parece que no hay nada de esta categoria</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-success">vende tu primer producto</a></a> o
                <a href="{{ route('home') }}">Vuelve a la home</a>
            
            @endforelse
        </div>
    </div>
    
</x-layout>