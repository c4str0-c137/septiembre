<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="container mt-5">
                        <h2>Subir Imágenes</h2>
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('guardar.imagenes') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="file" name="imagenes[]" multiple required>
                            <button type="submit" class="btn btn-primary mt-3">Subir Imágenes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>