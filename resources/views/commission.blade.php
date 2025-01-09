<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col md:flex-row gap-4 md:items-center justify-between">
      <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Commission List') }}
      </h1>
      <div class="space-y-1">
        <x-input-label class="uppercase">Affiliate Link</x-input-label>
        <div class="flex items-center gap-2">
          <x-text-input class="p-1 w-full md:min-w-[250px]" id="__aff_link"
            value="http://127.0.0.1:8000/register?ref={{ Auth::user()->affiliate_key }}" readonly />
          <button class="p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition"
            onclick="clipboard('http\:\/\/127.0.0.1:8000\/register?ref={{ Auth::user()->affiliate_key }}');">
            <x-heroicon-o-share id="__default_icon" title="Copy to clipboard" class="size-5 text-gray-800 dark:text-gray-200" />
            <x-heroicon-c-check id="__success_icon" title="Copied!" class="hidden size-5 text-green-400" />
          </button>
        </div>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900 dark:text-gray-100 grid grid-cols-5 gap-4">

        </div>
      </div>
    </div>
  </div>

  @section('script')
    <script>
      function clipboard(text) {
        const $defaultIcon = document.getElementById('__default_icon');
        const $successIcon = document.getElementById('__success_icon');

        $defaultIcon.classList.add('hidden');
        $successIcon.classList.remove('hidden');
        setTimeout(() => {
          $defaultIcon.classList.remove('hidden');
          $successIcon.classList.add('hidden');
        }, 2000);

        navigator.clipboard.writeText(text)
      }
    </script>
  @endsection
</x-app-layout>
