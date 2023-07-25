<main>
   @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>        
        @endif
    <div class="body_create">
       
        <div class="texting_create">

            <h2><b>{{ __('Crea un nuevo anuncio') }}</b></h2>
            
            <p>Despierta tu pasión. Únete a nuestra comunidad y comienza a vivir la vida que siempre soñaste crear! <b>Que estas esperando?</b></p>
            <img src="https://ayvisa.es/wp-content/uploads/2021/03/imagenes-para-paginas-web.jpg" alt="img_create">
        </div>
        <form class="card_created" wire:submit.prevent="store">
            @csrf

            <div class="position_top">
                <label for="title" >{{ __('Título') }}:</label>
                <input wire:model="title" type="text"  @error('title') is-invalid @enderror>
                @error('title')
                    {{ $message }}
                @enderror

                <label for="body">{{ __('Descripción') }}:</label>
                <textarea wire:model="body" cols="30" rows="15"  @error('body') is-invalid @enderror></textarea>
                @error('body')
                {{ $message }}
                @enderror
            </div>

            <div class="position_down ">
                <label for="price">{{ __('Precio') }}:</label>
                <input wire:model="price" type="number"  @error('price') is-invalid @enderror>
                @error('price')
                    {{ $message }}
                @enderror
            </div>
            <div class="position_down magin_down">
                <label for="category">{{ __('Categoría') }}:</label>
                <select class="colors" wire:model.defer="category" >
                    <option value="">{{ __('Selecciona una categoría') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="position_down margin_down">
                <input class="file_style" wire:model="temporary_images" type="file" name="images" multiple class=" @error('temporary_images.*') is-invalid @enderror">
                    @error('temporary_images.*')
                        <p class="text-danger mt-2">{{$message}}</p>
                    @enderror
            </div>
            @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>{{__('Vista previa') }}:</p>
                    <div class="row">
                        @foreach ($images as $key=>$image)
                            <div class="col-12 col-md-4">
                                <img src="{{ $image->temporaryUrl()}}" alt="" class="img-fluid">
                                <button type="button" class="btn btn-danger" wire:click="removeImage({{ $key }})">Eliminar</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
            <div>
                <button class="btn_create" type="submit" >{{ __('Crear') }}</button>
            </div>
        </form>
   
    </div>
    
</main>
   