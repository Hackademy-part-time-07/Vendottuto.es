<x-layout>
    <div class="container">
        <div class="d-flex justify-content-center my-5">
            <div class="col-12 col-md-6">

                    <div id="adImages" class="carousel slide" data-bs-ride="true">
                
                        <div class="carousel-indicators">
                
                            <button type="button" data-bs-target="xéadImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="xadImages" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="xadImages" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/700/600?a" class="d-block w-100" alt="...">

                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/700/600?b" class="d-block w-100" alt="...">

                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/700/600?c" class="d-block w-100" alt="...">

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#adImages" data-bs-side="prev">
                            <span class="carousel-control-prev-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>

                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#adImages"data-bs-slide="next">
                            <span class="carousel-control-prev-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                
                <div class="col-12 col-md-6 descripcionShow">
                    <div><b>Título: </b>{{ $ad->title }}</div>
                    <div><b>Precio: </b>{{ $ad->price }}</div>
                    <div><b>Descripción: </b>{{ $ad->body }}</div>
                    <div><b>Publicado el: </b>{{ $ad->created_at->format('d/m/Y') }}</div>
                    <div><b>Por: </b>{{ $ad->user->name}}</div>
                    <div><a class="category-tag" href="{{ route('category.ads', $ad->category) }}" >{{ $ad->category->name }}</a></div>
                    <div><a href="#" class="btn btn-success">Comprar</a></div>
                </div>
            </div>
            </div>
        </div>
        
    
    </x-layout>