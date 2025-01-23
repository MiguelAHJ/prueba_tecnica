<div class="flex flex-col gap-4">
    <header class="flex justify-between">
        <button wire:click="back">
            <i class="ri-arrow-left-line ri-xl text-indigo-500"></i>
        </button>
        <span class="text-lg font-bold text-gray-600">
            {{ $carro->marca->nombre }} - {{ $carro->modelo->nombre }} {{ $editForm->marca }}
        </span>
        <span class="{{ $carro->activo ? 'text-green-500' : 'text-red-500' }}">
            {{ $carro->activo ? 'Activo' : 'Inactivo' }}
        </span>
    </header>
    <main class="flex flex-col gap-4">
        <form wire:submit.prevent="update">
        <div class="flex gap-4 w-full">
            <div class="w-full">
                <x-input-label for="editForm.marca" :value="__('Marca')" />
                <select id="editForm.marca" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model.live="editForm.marca" autocomplete="editForm.marca">
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id_marca }}" {{ $carro->id_marca == $marca->id_marca ? 'selected' : '' }}>
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('editForm.marca')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="editForm.modelo" :value="__('Modelo')" />
                <select id="editForm.modelo" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" wire:model="editForm.modelo" autocomplete="editForm.modelo">
                    @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id_modelo }}" {{ $carro->id_modelo == $modelo->id_modelo ? 'selected' : '' }}>
                            {{ $modelo->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('editForm.modelo')" class="mt-2" />
            </div>
        </div>
        <div class="flex gap-4 w-full">
            <div class="w-full">
                <x-input-label for="editForm.anio" :value="__('Año')" />
                <x-text-input id="editForm.anio" class="block mt-1 w-full" type="number" wire:model.blur="editForm.anio" autocomplete="editForm.modelo" required/>
                <x-input-error :messages="$errors->get('editForm.anio')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="editForm.color" :value="__('Color')" />
                <x-text-input id="editForm.color" class="block mt-1 w-full" type="text" wire:model.blur="editForm.color" autocomplete="editForm.color" required />
                <x-input-error :messages="$errors->get('editForm.color')" class="mt-2" />
            </div>
        </div>
        <div class="flex gap-4 w-full">
            <div class="w-full">
                <x-input-label for="editForm.precio" :value="__('Precio')" />
                <x-text-input id="editForm.precio" class="block mt-1 w-full" type="number" wire:model.blur="editForm.precio" autocomplete="editForm.precio" required />
                <x-input-error :messages="$errors->get('editForm.precio')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="editForm.kilometraje" :value="__('Kilometraje')" />
                <x-text-input id="editForm.kilometraje" class="block mt-1 w-full" type="text" wire:model.blur="editForm.kilometraje" autocomplete="editForm.kilometraje" required />
                <x-input-error :messages="$errors->get('editForm.kilometraje')" class="mt-2" />
            </div>
        </div>
        <div class="flex gap-4 w-full">
            <div class="flex flex-col gap-2 w-full justify-center items-center">
                <span class="text-sm text-gray-500 uppercase">Imagen Actual</span>
                <span class="rounded-md overflow-hidden">
                    <img src="{{ asset( $carro->img_path) }}" alt="" class="h-32 w-32 object-cover">
                </span>
            </div>
            <div class="flex flex-col gap-2 w-full">
                <x-input-label for="editForm.img" :value="__('Imagen')" />
                <input type="file" id="editForm.img" class="block mt-1 w-full" wire:model="editForm.img" autocomplete="editForm.img" required>
                <x-input-error :messages="$errors->get('editForm.img')" class="mt-2" />
                <button type="submit" class="mt-4 border text-black py-2 px-4 rounded">
                    Actualizar
                </button>
            </div>
        </div>
        </form>
    </main>
</div>
