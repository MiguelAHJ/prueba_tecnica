<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
    @foreach ($carros as $carro)
    <article class="flex flex-col rounded-md overflow-hidden shadow-md">
        <header class="flex w-full h-40 bg-slate-500">
            <img src="{{ asset( $carro->img_path ) }}" alt="" class="w-full h-full object-cover">
            {{-- <img src="{{ asset('storage/' . $carro->img_path) }}" alt="" class="w-full h-full object-cover"> --}}
        </header>
        <main class="flex flex-col gap-2 w-full p-4">
            <header class="text-lg font-bold text-gray-600 uppercase flex flex-col gap-1">
                <span>{{ $carro->marca->nombre }} - {{ $carro->modelo->nombre }}</span>
                <span class="text-sm text-gray-500">$ {{ $carro->precio }}</span>
            </header>
            <main class="text-md text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, impedit?
            </main>
            <footer class="flex gap-2">
                <span class="rounded-lg p-1 px-2 bg-slate-500">
                    {{ $carro->anio }}
                </span>
                <span class="rounded-lg p-1 px-2 bg-slate-500">
                    {{ $carro->color }}
                </span>
            </footer>
        </main>
    </article>
    @endforeach
    
</div>
