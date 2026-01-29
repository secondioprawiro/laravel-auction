<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
    @foreach($items as $item)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 hover:shadow-lg transition duration-300">
            
            <div class="h-48 bg-gray-200 w-full object-cover flex items-center justify-center text-gray-500">
                @if($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="h-full w-full object-cover">
                @else
                    <span class="text-4xl">📦</span>
                @endif
            </div>

            <div class="p-5">
                <h3 class="text-lg font-bold text-gray-900 mb-2 truncate">{{ $item->title }}</h3>
                
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                    {{ $item->description }}
                </p>

                <div class="flex justify-between items-center border-t pt-4">
                    <div>
                        <p class="text-xs text-gray-500">Harga Saat Ini</p>
                        <p class="text-green-600 font-bold text-lg">
                            Rp {{ number_format($item->current_price ?? $item->start_price, 0, ',', '.') }}
                        </p>
                    </div>
                    
                    <a href="{{ route('auction.show', $item) }}" wire:navigate class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition">
                        Tawar Sekarang
                    </a>
                </div>
                
                <div class="mt-3 text-xs text-gray-500 text-center bg-gray-50 py-1 rounded">
                    Berakhir: {{ $item->end_time->format('d M Y, H:i') }}
                </div>
            </div>
        </div>
    @endforeach
</div>