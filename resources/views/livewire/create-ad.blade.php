<main>
   @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>        
        @endif
    <div class="body_create">
       
        <div class="texting_create">
            <h2><b>{{ __('Crea un nuevo anuncio') }}</b></h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, neque? Odit eum sed quia et repellat impedit. Quae voluptates amet architecto minima repellat, consequatur est corporis, numquam cum inventore aliquam! <b>Que estas esperando?</b></p>
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

            <div class="position_down">
                <label for="price">{{ __('Precio') }}:</label>
                <input wire:model="price" type="number"  @error('price') is-invalid @enderror>
                @error('price')
                    {{ $message }}
                @enderror
            </div>

            <div class="position_down">
                <label for="category">{{ __('Categoría') }}:</label>
                <select wire:model.defer="category" >
                    <option value="">{{ __('Selecciona una categoría') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="position_down">
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
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
                                <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid">
                                <button type="button" class="btn btn-danger" wire:click="removeImage({{ $key }})">Eliminar</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
            <div>
                <button class="btn bg-body-secondary" type="submit" >{{ __('Crear') }}</button>
            </div>
        </form>
   
    </div>
    
</main>
   