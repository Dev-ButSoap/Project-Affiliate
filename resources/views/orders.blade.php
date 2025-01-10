<x-app-layout>
  <x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('ประวัติการสั่งซื้อ') }}
    </h1>
  </x-slot>

  <div class="py-6">
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
          "oLanguage": {
            "sSearch": "ค้นหา",
            "sEmptyTable": "ไม่มีข้อมูล.",
            "oPaginate": {
              'sPrevious': "ก่อนหน้า",
              'sNext': "ถัดไป",
            },
          },
          responsive: true,
          autoWidth: false,
          lengthChange: false,
          bInfo: false,
          order: [],
          serverSide: true,
          ajax: "{{ route('order.datatable') }}",
          columnDefs: [{
            targets: [0],
            width: 120,
          }],
          columns: [{
              data: "date",
              title: "วันที่",
            },
            {
              data: "product",
              title: "สินค้า",
            },
            {
              data: "price",
              title: "ราคาสินค้า",
            },
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
