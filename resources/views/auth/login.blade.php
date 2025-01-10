<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('อีเมล')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('รหัสผ่าน')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    @if (Route::has('password.request'))
      <a class="underline mt-2 ml-auto block w-max text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
        href="{{ route('password.request') }}">
        {{ __('ลืมรหัสผ่าน?') }}
      </a>
    @endif

    <div class="space-y-4 mt-4">
      <x-primary-button class="w-full justify-center !text-base">
        {{ __('เข้าสู่ระบบ') }}
      </x-primary-button>
      <div class="text-center text-sm text-gray-600 dark:text-gray-400">
        ยังไม่เป็นสมาชิก?
        <a href="{{ route('register') }}"
          class="underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">สมัครสมาชิก</a>
      </div>
    </div>
  </form>
</x-guest-layout>
