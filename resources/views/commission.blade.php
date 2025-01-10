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
            <x-heroicon-o-share id="__default_icon" title="Copy to clipboard"
              class="size-5 text-gray-800 dark:text-gray-200" />
            <x-heroicon-c-check id="__success_icon" title="Copied!" class="hidden size-5 text-green-400" />
          </button>
        </div>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <x-datatable id="__datatables" />
      </div>
    </div>
  </div>

  @section('script')
    <script type="module" src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script type="module">
      $(document).ready(function() {
        let table = new DataTable('#__datatables', {
          processing: true,
          language: {
            processing: `<div class="flex absolute top-1/2 left-1/2 -translate-x-1/2 text-gray-800 dark:text-gray-200">
              <svg class="animate-spin mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>Processing...
            </div>`
          },
          autoWidth: false,
          lengthChange: false,
          bInfo: false,
          order: [],
          serverSide: true,
          ajax: "{{ route('commission.datatable') }}",
          columns: [{
              data: "date",
              title: "วันที่",
            }, {
              data: "name",
              title: "ชื่อผู้ใช้",
            },
            {
              data: "product",
              title: "สินค้า",
            },
            {
              data: "price",
              title: "ราคาสินค้า",
            },
            {
              data: "percent",
              title: "เปอร์เซ็น",
            },
            {
              data: "amount",
              title: "ค่าคอมมิชชัน",
            }
          ],
        });
      });
    </script>
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
