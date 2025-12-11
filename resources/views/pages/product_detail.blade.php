<x-skeleton judul="Product Detail">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-2 gap-10">

        {{-- === LEFT IMAGE / GALLERY === --}}
        <div>
            <img src="{{ $item->item_image }}" class="w-full rounded-xl shadow" alt="Product Image">

            <div class="grid grid-cols-3 gap-4 mt-4">
                <img src="{{ $item->item_image }}" class="rounded-lg cursor-pointer hover:opacity-80 transition">
                <img src="{{ $item->item_image }}" class="rounded-lg cursor-pointer hover:opacity-80 transition">
                <img src="{{ $item->item_image }}" class="rounded-lg cursor-pointer hover:opacity-80 transition">
            </div>
        </div>

        {{-- === RIGHT DETAILS === --}}
        <div class="space-y-6">

            {{-- TITLE + PRICE --}}
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold">{{ $item->item_name }}</h1>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-yellow-500 text-xl">★</span>
                        <span class="text-gray-600">{{ number_format($item->rating, 1) }}</span>
                        <a href="#" class="text-sm text-blue-600 underline">See all reviews</a>
                    </div>
                </div>

                <span class="text-2xl font-semibold text-gray-900">
                Rp{{ number_format($item->item_price) }}
            </span>
            </div>

            {{-- COLOR SELECTOR --}}
            <div>
                <p class="font-medium mb-2">Color</p>
                <div class="flex gap-3">
                    <button class="w-8 h-8 rounded-full border border-gray-400 bg-black"></button>
                    <button class="w-8 h-8 rounded-full border border-gray-400 bg-gray-400"></button>
                </div>
            </div>

            {{-- SIZE SELECTOR --}}
            <div>
                <p class="font-medium mb-2">Size</p>

                <div class="grid grid-cols-6 gap-2">
                    @foreach (['XXS','XS','S','M','L','XL'] as $size)
                        <button class="py-2 border rounded-lg text-sm font-medium hover:bg-gray-100">
                            {{ $size }}
                        </button>
                    @endforeach
                </div>

                <a href="#" class="text-sm text-blue-600 underline mt-1 inline-block">See sizing chart</a>
            </div>

            {{-- ADD TO CART --}}
            <form method="POST" action="{{ route('cart.store') }}">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->item_id }}">

                <button class="w-full py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">
                    Add to cart
                </button>
            </form>

            {{-- DESCRIPTION --}}
            <div>
                <h2 class="font-semibold text-lg mb-2">Description</h2>
                <p class="text-gray-700 leading-relaxed">
                    {{ $item->item_description }}
                </p>
            </div>

            {{-- FABRIC & CARE --}}
            <div>
                <h2 class="font-semibold text-lg mb-2">Fabric & Care</h2>

                <ul class="list-disc pl-6 text-gray-700">
                    <li>Only the best materials</li>
                    <li>Ethically and locally made</li>
                    <li>Pre-washed and pre-shrunk</li>
                    <li>Machine wash cold with similar colors</li>
                </ul>
            </div>

            {{-- INFO BOX --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="border rounded-xl p-4 text-center">
                    <p class="font-semibold">International delivery</p>
                    <p class="text-sm text-gray-600">Get your order in 2 years</p>
                </div>
                <div class="border rounded-xl p-4 text-center">
                    <p class="font-semibold">Loyalty rewards</p>
                    <p class="text-sm text-gray-600">Don’t look at other tees</p>
                </div>
            </div>

        </div>
    </div>
</x-skeleton>
