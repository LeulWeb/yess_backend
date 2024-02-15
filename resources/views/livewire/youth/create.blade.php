<div>
    <div class=" flex items-center ">

        <a wire:navigate href="{{ route('youth.index') }}">
            <iconify-icon data-tooltip-target="tooltip-default" icon="ion:arrow-back" style="color: blue;"
                width="32"></iconify-icon>
        </a>
        <div id="tooltip-default" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Go Back
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>


    </div>
    <form wire:submit.prevent='create' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">



        <div class="max-w-sm">



            {{-- ? Select user --}}


            <div class="max-w-sm mx-auto">



                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                    User</label>
                <select wire:model.live.debounce.200ms='user_id' id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    @foreach ($userList as $user)
                        <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                    @endforeach

                </select>


            </div>


            {{-- end of select user --}}


            {{-- text area achivement --}}
            <label for="message" class="block mb-2 my-5 text-sm font-medium text-gray-900 dark:text-white">User
                Achievement</label>
            <textarea wire:model.live.debounce.200ms='achievment' id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."></textarea>
            @error('achievment')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror

            {{-- end of textarea --}}



            <label for="website-admin" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Youtube
                Link</label>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <iconify-icon icon="logos:youtube-icon" width="32" height="32"></iconify-icon>
                </span>
                <input wire:model.live.debounce.200ms='video_link' type="text" id="website-admin"
                    class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Youtube Link">
                @error('video_link')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-white my-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>



            {{-- * Modal form --}}




            {{-- * end of modal --}}
        </div>


    </form>

</div>
