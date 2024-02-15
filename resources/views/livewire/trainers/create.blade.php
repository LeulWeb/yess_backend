
    <div>
        <div class=" flex items-center ">


            <a wire:navigate href="{{ route('trainers.index') }}">
                <iconify-icon data-tooltip-target="tooltip-default" icon="ion:arrow-back" style="color: blue;"
                    width="32"></iconify-icon>
            </a>
            <div id="tooltip-default" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Go Back
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>



        </div>
        <article class="format lg:format-lg dark:format-invert mt-4  ml-6 mb-7">
            <h2>Create Trainers </h2>
        </article>

        <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">
            <div class="grid md:grid-cols-6 gap-5 items-center">

                {{-- First column --}}
                <div class="col-span-5 grid grid-cols-2 gap-3">

                    {{-- 1st --}}
                    <div>
                        {{-- Trainer's Name --}}
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trainer's
                            Name</label>
                        <input type="text" wire:model.live='name' id="name"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="ame">

                        @error('name')
                            <x-form.error :$message />
                        @enderror
                    </div>
                    {{-- second --}}

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Company
                            Email</label>
                        <input type="email" wire:model.live='email' id="email"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="jhon@email.com">

                        @error('email')
                            <x-form.error :$message />
                        @enderror



                    </div>


                </div>

            </div>


            <div class="grid grid-cols-2 gap-5">
                {{-- profile upload --}}

                <div class="flex flex-col items-center justify-center w-full">

                    <label for="dropzone-file-one"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if ($profile)
                                <img src="{{ $profile->temporaryUrl() }}" class="bg-cover bg-center" alt="">
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to
                                        upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            @endif
                        </div>
                        <input wire:model.live='profile' id="dropzone-file-one" type="file" class="hidden mb-6" />
                        <div wire:loading wire:target="profile">Uploading...</div>
                    </label>


                    <div>
                        @error('profile')
                            <x-form.error :$message />
                        @enderror
                    </div>

                </div>



            </div>

            <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
                <button wire:click ="cancel" type="button"
                    class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                <button  type="submit"
                    class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                    trainer</button>

            </div>

        </form>

    </div>

