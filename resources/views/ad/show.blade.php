<x-layout>

    <div class="contedor_show">
                    <div class="show_position">
                        <div id="adImages" class=" carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                @for ($i = 0; $i < $ad->images()->count(); $i++)
                                    <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{ $i }}" class="@if($i == 0) active @endif" aria-current="true" aria-label="Slide {{ $i + 1 }}"></button>
                                @endfor
                            </div>
                            <div class="carousel-inner">
                                @foreach ($ad->images as $image )
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(400,300) }}" alt="..." class="d-block w-100">
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="position_show_body">
                             <div class="show_article">

                            <div class="title_show"><b>{{ $ad->title }} </b></div>
                            <div class="price_show"><b>{{__('Precio') }}: </b>{{ $ad->price }}</div>
                             <div class="data_show" ><b>{{__('Publicado el') }}: </b>{{ $ad->created_at->format('d/m/Y') }}</div>
                            <div class="create_show"><b>{{ $ad->user->name}}</b></div>
                            <div class="category_show"><a href="{{ route('category.ads', $ad->category) }}" >{{ $ad->category->name }}</a></div>

                            <div class="descriptions_show"><b>{{__('Descripción') }}: </b></div>
                            <div class="text_description">{{ $ad->body }}</div>
                            
                           
                            </div> 
                        </div>
                       
                    </div>
                    <div class="items">
                        <div>
                        <button class="carousel_button"><i class="bi bi-basket"><b>{{ _('agergar al carrito') }}</b> </i></button>
                        </div>
                        <div>
                            <button class="contatti"><i class="bi bi-telephone"><b>{{ _('contacta') }}</b></i></button>
                        </div>
                    </div>

                    
                   
    </div>
</x-layout>