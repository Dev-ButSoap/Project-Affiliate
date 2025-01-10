@props(['id'])

<div class="relative overflow-x-auto overflow-y-hidden">
  {{ $slot }}
  <table
    class="!w-full mt-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-md"
    id="{{ $id }}">
    <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-200"></thead>
  </table>
</div>
