<header>
     @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>        
        @endif
    <div class="body_create">
       
        <div class="texting_create">
            <h2><b>Crea un nuevo Anuncio</b></h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, neque? Odit eum sed quia et repellat impedit. Quae voluptates amet architecto minima repellat, consequatur est corporis, numquam cum inventore aliquam! <b>Que estas esperando?</b></p>
            <img src="https://ayvisa.es/wp-content/uploads/2021/03/imagenes-para-paginas-web.jpg" alt="img_create">
        </div>
        <form class="card_created" wire:submit.prevent="store">
            @csrf

            <div class="position_top">
                <label for="title" >titulo:</label>
                <input wire:model="title" type="text"  @error('title') is-invalid @enderror>
                @error('title')
                    {{ $message }}
                @enderror

                <label for="body">Descripción:</label>
                <textarea wire:model="body" cols="30" rows="15"  @error('body') is-invalid @enderror></textarea>
                @error('body')
                {{ $message }}
                @enderror
            </div>

            <div class="position_down">
                <label for="price">Precio:</label>
                <input wire:model="price" type="number"  @error('price') is-invalid @enderror>
                @error('price')
                    {{ $message }}
                @enderror
            </div>

            <div class="position_down">
                <label for="category">Categoria:</label>
                <select wire:model.defer="category" >
                    <option value="">Selecciona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> 
            <div>
                <button class="btn bg-body-secondary" type="submit" >Crear</button>
            </div>
        </form>
   
    </div>
    
</header>