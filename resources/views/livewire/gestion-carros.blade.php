<div>
    <header>

    </header>
    <main class="flex flex-col gap-2">
        <div class="flex flex-col md:flex-row gap-2 items-center justify-between">
            <div class="flex w-full md:w-full justify-between">
                <div class="relative w-42">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500"
                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full pl-10 p-2 px-12 sm:px-6 lg:px-8"
                        placeholder="Buscar...">
                </div>
                <button type="button" wire:click="create" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Crear Carro
                </button>
            </div>
        </div>
        <section class="rounded-md overflow-hidden">
            <table class="w-full text-sm">
                <thead class="text-xs text-secondary uppercase bg-gray-200">
                    <tr class="">
                        @include('livewire.includes.sort-table', ['column' => 'nombre', 'displayName' => 'Marca'])
                        @include('livewire.includes.sort-table', ['column' => 'nombre', 'displayName' => 'Modelo'])
                        <th class="px-4 py-3 text-left">Imagen</th>
                        @include('livewire.includes.sort-table', ['column' => 'activo', 'displayName' => 'Status'])
                        <th class="px-4 py-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($carros as $carro)
                        <tr wire:key="{{ $carro->id_carro }}" class="border-b text-left">
                            <td class="px-4 py-3 font-medium text-secondary text-black">{{ $carro->marca->nombre }}</td>
                            <td class="px-4 py-3 font-medium text-secondary text-black">{{ $carro->modelo->nombre }}</td>
                            <td class="px-4 py-3 font-medium text-secondary text-black"><img src="{{ asset( $carro->img_path) }}" alt="" class="w-8 h-8 rounded-full object-cover"></td>
                            <td class="px-4 py-3 font-medium {{ $carro->activo ? 'text-green-500' : 'text-red-500' }}">{{ $carro->activo ? 'Activo' : 'Inactivo' }}</td>
                            <td class="px-4 py-3 text-center w-32">
                                    <button wire:click="edit({{ $carro }})" title="Editar">
                                        <i class="ri-edit-line ri-xl text-indigo-500" ></i>
                                    </button>
                                    <i class="{{ $carro->activo ? 'ri-close-circle-line text-red-500' : 'ri-checkbox-circle-line text-green-500' }} ri-xl cursor-pointer" wire:click="changeEstatus({{$carro->id_carro}})" title="{{$carro->activo ? 'Desactivar' : 'Activar'}}"></i>
                                    <button wire:click="delete({{ $carro }})" title="Editar">
                                        <i class="ri-delete-bin-line ri-xl text-red-500" ></i>
                                    </button>
                            </td>
                        </tr>
                    @empty
                        <tr class="border-b text-center">
                            <th colspan="9" class="py-7 text-default text-2xl">No hay carros disponibles</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <div class="py-4 px-3">
            <div class="flex space-x-4 items-center mb-3">
                <label class="w-32 text-sm font-medium text-gray-900">Por página</label>
                <select
                    wire:model.live="perPage"
                    class="md:max-w-36 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5 ">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
            {{ $carros->links() }}
        </div>
    </main>
</div>

