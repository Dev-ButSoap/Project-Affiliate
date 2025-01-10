<x-app-layout>
  <x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('สินค้าทั้งหมด') }}
    </h1>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900 dark:text-gray-100 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
          @foreach ($products as $product)
            <form method="POST" action="{{ route('order') }}"
              class="rounded-md overflow-hidden bg-gray-400 flex flex-col group">
              @csrf
              <div class="relative rounded-b-md h-[150px] xl:h-[200px] shrink-0 overflow-hidden">
                <img src="{{ $product->product_image }}" alt="{{ $product->product }}"
                  class="w-full h-full object-cover group-hover:scale-105 transition">
                <div
                  class="absolute right-0 bottom-0 bg-red-600 px-2.5 rounded-tl-md text-lg font-medium text-gray-100">
                  {{ $product->price }}฿</div>
              </div>
              <div class="p-2 flex flex-col justify-between h-full gap-5">
                <h2 class="text-gray-800 leading-none font-semibold text-base">{{ $product->product }}</h2>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <x-danger-button class="justify-center">
                  <x-heroicon-s-shopping-cart class="size-4 me-1" />ซื้อสินค้า
                </x-danger-button>
              </div>
            </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
