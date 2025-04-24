<div class="p-6">
    <h2 class="text-2xl font-bold mb-4 capitalize">Menu {{ $kategori }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($menus as $menu)
            <div class="bg-white rounded-lg shadow p-4">
                @if($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" class="w-full h-40 object-cover rounded mb-3" alt="{{ $menu->name }}">
                @endif
                <h3 class="text-lg font-semibold">{{ $menu->name }}</h3>
                <p class="text-gray-700">Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                @if($menu->bestseller)
                    <span class="inline-block mt-2 text-sm bg-yellow-400 text-black px-2 py-1 rounded">Best Seller</span>
                @endif
            </div>
        @empty
            <p class="col-span-3 text-gray-500">Belum ada menu dalam kategori ini.</p>
        @endforelse
    </div>
</div>
