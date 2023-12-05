<x-guest-layout>
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
          {{-- <h3 class="text-2xl font-bold">Categorias</h3> --}}
          <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
            Categorias</h2>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
          <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($categories as  $category)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                
                {{-- <img class="w-full h-48" src= "{{Storage::url($category->url) }}" alt="Image" />  origiinal --}}
                {{-- <img class="w-full h-48" src="{{ url('/storage/' . $category->url) }}" alt="Image"> --}}
                <img class="w-full h-48" src= "{{asset($category->url)}}" alt="Image" />
                <div class="px-6 py-4">
                    <a href="{{ route('categories.show', $category->id) }}">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">{{$category->nombre}}</h4>
                    </a>  
                    <p class="leading-normal text-gray-700">{{$category->descripcion}}</p>
                </div>
                
                
            </div>
            @endforeach

 
  
          </div>
        </div>
      </section>
</x-guest-layout>