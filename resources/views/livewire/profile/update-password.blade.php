<div>
    <form wire:submit.prevent="updatePassword" class="mt-6 space-y-6">
        <div>
            <label for="currentPassword" class="block font-medium text-gray-900">Current Password</label>
            <input wire:model="currentPassword" id="currentPassword" name="currentPassword" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            @error('currentPassword') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password" class="block font-medium text-gray-900">New Password</label>
            <input wire:model="password" id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            
            <label for="passwordConfirmation" class="block font-medium text-gray-900">Confirm Password</label>
            <input wire:model="passwordConfirmation" id="passwordConfirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            @error('passwordConfirmation') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

            @if (session('success'))
                <p class="text-green-500">{{ session('success') }}</p>
            @endif
        </div>
    </form>
</div>
