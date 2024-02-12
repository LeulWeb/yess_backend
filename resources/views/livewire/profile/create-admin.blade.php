<div>
@if (session()->has('success'))
        <div class="bg-green justify-end">{{ session('success') }}</div>
    @endif
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Sub Admin') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('You can Create An admin that can handle your activities like you on the page!.') }}
        </p>
    </header>


<form method="post"  class="mt-6 w-full" wire:submit.prevent="createAdmin">
    <div class="mb-5" w-full m-2 p-2>
        <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Admin Name</label>
        <input wire:model="name" type="text" id="name" class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Admin Name" required>
        @error('name')
            <x-form.error :$message />
        @enderror

      </div>
    <div class="mb-5">
      <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Admin email</label>
      <input wire:model ="email" type="email" id="email" class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="adminemail@gmail.com" required>
      @error('email')
            <x-form.error :$message />
      @enderror
    </div>
    <div class="mb-5">
      <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Admin password</label>
      <input wire:model ="password" type="password" id="password" class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
      @error('password')
            <x-form.error :$message />
         @enderror
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full   py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Admin</button>
  </form>
</div>







