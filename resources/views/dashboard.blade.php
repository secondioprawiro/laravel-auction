<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Lelang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session()->has('message'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md animate-bounce">
                    {{ session('message') }}
                </div>
            @endif
            <livewire:auction-list /> 
        </div>
    </div>
</x-app-layout>