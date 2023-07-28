<x-layout>
    @if ($ad)
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card formularios box_shadow">
                    <div class="card-header">
                        {{__('Anuncio') }} {{ $ad->id }}
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="padding-left: 5rem; margin-top:1rem;" >
                            <b>{{ __('Imágenes') }}</b>
                        </div>
                        <div class="col-9" style="margin-top:1.5rem;">
                            <div class="row">
                                @forelse ($ad->images as $image )
                                    <div class="col-md-4">
                                        <img src="{{$image->getUrl(400,300)}}" class="img-fluid" alt="...">
                                    </div>
                                    <div class="col-md-8" style="padding:2.5rem;">
                                       <b>Adult:</b><i class="bi bi-circle-fill {{$image->adult}}"></i>[{{ $image->adult }}]<br>
                                        <b>Spoof:</b><i class="bi bi-circle-fill {{$image->spoof}}"></i>[{{ $image->spoof }}]<br>
                                        <b>Medical:</b><i class="bi bi-circle-fill {{$image->medical}}"></i>[{{ $image->medical }}] <br>
                                        <b>Violence:</b><i class="bi bi-circle-fill {{$image->violence}}"></i>[{{ $image->violence}}] <br>
                                        <b>Racy:</b><i class="bi bi-circle-fill {{$image->racy}}"></i>[{{$image->racy}}]
                                        <br><br>
                                        
                                        <b>Labels</b> <br>
                                        @foreach($image->labels as $label)
                                        <a href="#" class="btn btn-info btn-sm m-1">{{$label}}</a>
                                        @endforeach
                                        <br><br>
                                        <b>id:</b>{{$image->id}}<br>
                                        <b>path:</b>{{$image->path}}<br>
                                        <b>url:</b>{{ Storage::url($image->path)}}
                                        <br>
                                        <br>
                                    </div>
                                @empty
                                    <div class="col 12">
                                        <b>{{ __('No hay imágenes') }}</b>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="card-body" style="margin-top:0.5rem; ">
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Usuario') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->user->id }} - {{ $ad->user->name }} - {{ $ad->user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Título') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->title }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Precio') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->price }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Descripción') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->body }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Categoría') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->category->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Fecha de creación') }}</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->created_at }}
                            </div>
                        </div>
                    </div>





                </div>
                    



                
            </div>
        </div>

        <div class="text_center_2">
                    <div >
                        <form action="{{ route('revisor.ad.accept', $ad) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="button">{{__('Aceptar') }}</button>
                        </form>
                    </div>
                    <div >
                        <form action="{{ route('revisor.ad.reject', $ad) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="button_2">{{__('Rechazar') }}</button>
                        </form>
                    </div>
                </div>
    </div>
    @else
    <h3 class="text_center">{{__('No hay anuncios para revisar, vuelve más tarde, gracias.') }}</h3>
    @endif
</x-layout>