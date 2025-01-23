<div class="flex flex-col gap-4">
    <header class="flex justify-between">
        <button wire:click="back">
            <i class="ri-arrow-left-line ri-xl text-indigo-500"></i>
        </button>
        <span class="text-lg font-bold text-gray-600">
            Crea tu carro
        </span>
        <span class="">
            
        </span>
    </header>
    <main class="flex flex-col gap-4">
        <form wire:submit.prevent="create">
        <div class="flex gap-4 w-full">
            <div class="w-full">
                <x-input-label for="createForm.marca" :value="__('Marca')" />
                <select id="createForm.marca" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model.live="createForm.marca" autocomplete="createForm.marca">
                    <option value="" selected>Selecciona una marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id_marca }}">
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('createForm.marca')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="createForm.modelo" :value="__('Modelo')" />
                <select id="createForm.modelo" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="createForm.modelo" autocomplete="createForm.modelo">
                    <option value="" selected>Selecciona una marca</option>
                    @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id_modelo }}">
                            {{ $modelo->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('createForm.modelo')" class="mt-2" />
            </div>
        </div>
        <div class="flex gap-4 w-full">
            <div class="w-full">
                <x-input-label for="createForm.anio" :value="__('Año')" />
                <x-text-input id="createForm.anio" class="block mt-1 w-full" type="number" wire:model.blur="createForm.anio" autocomplete="createForm.modelo" required/>
                <x-input-error :messages="$errors->get('createForm.anio')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="createForm.color" :value="__('Color')" />
                <x-text-input id="createForm.color" class="block mt-1 w-full" type="text" wire:model.blur="createForm.color" autocomplete="createForm.color" required />
                <x-input-error :messages="$errors->get('createForm.color')" class="mt-2" />
            </div>
        </div>
        <div class="flex gap-4 w-full">
            <div class="w-full">
                <x-input-label for="createForm.precio" :value="__('Precio')" />
                <x-text-input id="createForm.precio" class="block mt-1 w-full" type="number" wire:model.blur="createForm.precio" autocomplete="createForm.precio" required />
                <x-input-error :messages="$errors->get('createForm.precio')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="createForm.kilometraje" :value="__('Kilometraje')" />
                <x-text-input id="createForm.kilometraje" class="block mt-1 w-full" type="text" wire:model.blur="createForm.kilometraje" autocomplete="createForm.kilometraje" required />
                <x-input-error :messages="$errors->get('createForm.kilometraje')" class="mt-2" />
            </div>
        </div>
        <div class="flex gap-4 w-full">
            <div class="flex flex-col gap-2 w-full">
                <x-input-label for="createForm.img" :value="__('Imagen')" />
                <input type="file" id="createForm.img" class="block mt-1 w-full" wire:model="createForm.img" autocomplete="createForm.img" required>
                <x-input-error :messages="$errors->get('createForm.img')" class="mt-2" />
                <button type="submit" class="mt-4 border text-black py-2 px-4 rounded">
                    Actualizar
                </button>
            </div>
        </div>
        </form>
    </main>
</div>
