<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div>
                    <div class="h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500 mb-4">
                        @if($this->item->image)
                            <img src="{{ Storage::url($this->item->image) }}" class="h-full w-full object-cover rounded-lg">
                        @else
                            <span class="text-6xl">📦</span>
                        @endif
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $this->item->title }}</h1>
                    <p class="mt-4 text-gray-600">{{ $this->item->description }}</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <div class="text-center mb-6">
                        <p class="text-sm text-gray-500 uppercase tracking-wide">Harga Saat Ini</p>
                        <p class="text-5xl font-extrabold text-green-600 mt-2 transition-all duration-300">
                            Rp {{ number_format($this->item->current_price ?? $this->item->start_price, 0, ',', '.') }}
                        </p>
                    </div>

                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit="placeBid" class="mt-8">
                        <div>
                            <input wire:model="amount" type="number" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3" 
                                placeholder="Masukkan tawaran (cth: 1500000)...">
                            
                            @error('amount') 
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>

                        <button type="submit" class="w-full mt-4 bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition flex justify-center">
                            <span wire:loading.remove wire:target="placeBid">Tawar Sekarang 🔨</span>
                            <span wire:loading wire:target="placeBid">Memproses... ⏳</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>