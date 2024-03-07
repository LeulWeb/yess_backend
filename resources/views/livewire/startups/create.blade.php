<div>
    <div class=" flex items-center ">


        <a wire:navigate href="{{ route('startups.index') }}">
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
        <h2>Create Startups </h2>
    </article>

    <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">
        <div class="grid md:grid-cols-6 gap-5 items-center">


            {{-- Second column --}}
            <div class="">

                <div class="flex items-center justify-center  w-32 h-32 rounded-full mb-3">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-32 h-32  border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">

                            @if ($logo)
                                <img class="bg-cover w-32 h-32 bg-center rounded-full" src="{{ $logo->temporaryUrl() }}"
                                    alt="Bordered avatar">
                            @else
                                <iconify-icon icon="icon-park-outline:add-picture" width="32"></iconify-icon>
                            @endif


                        </div>
                        <input id="dropzone-file" wire:model.live='logo' type="file" class="hidden" />
                        <div wire:loading wire:target="logo">Uploading...</div>
                    </label>
                </div>

                <div>
                    @error('logo')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>

            {{-- First column --}}
            <div class="col-span-5 grid grid-cols-2 gap-3">

                {{-- 1st --}}
                <div>
                    {{-- Comapnyt Name --}}
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comapny
                        Name</label>
                    <input type="text" wire:model.live='name' id="name"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Taye Animaw..">

                    @error('name')
                        <x-form.error :$message />
                    @enderror


                    {{-- Founder name --}}
                    <label for="founder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Company
                        Founder</label>
                    <input type="text" wire:model.live='founder' id="founder"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="founder Name">

                    @error('founder')
                        <x-form.error :$message />
                    @enderror

                </div>

                {{-- second --}}

                <div>
                    <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Company
                        Email</label>
                    <input type="email" wire:model.live='contact_email' id="contact_email"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="jhon@email.com">

                    @error('contact_email')
                        <x-form.error :$message />
                    @enderror


                    <div class="grid grid-cols-2 gap-3">


                        <div>
                            <label for="sector"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="hidden md:inline">Company</span> Sector</label>

                            <select wire:model.live='sector' id="sector"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($JobSectors as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('sector')
                                <x-form.error :$message />
                            @enderror


                        </div>



                        <div>
                            <label  for="empNum"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employees <span
                                    class="hidden md:inline">Number</span></label>
                            <input wire:model.live='employees' type="number" id="empNum" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="3087">

                            @error('employees')
                                <x-form.error :$message />
                            @enderror
                        </div>
                    </div>

                </div>


            </div>

        </div>



        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Social
            Media</label>
        <div class="grid grid-cols-4 gap-5">

            <div>
                {{-- Telegarm --}}
                <div class="relative mb-6 flex flex-col">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <iconify-icon icon="logos:telegram"></iconify-icon>
                    </div>
                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Telegram" wire:model.live.debounce.300ms='telegram'>

                </div>
                <div>
                    @error('telegram')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>


            {{-- linked in --}}
            <div>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <iconify-icon icon="skill-icons:linkedin"></iconify-icon>
                    </div>
                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="LinkedIn" wire:model.live.debounce.300ms='linkedin'>

                </div>
                <div>
                    @error('linkedin')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>


            {{-- facebook --}}
            <div>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <iconify-icon icon="logos:facebook"></iconify-icon>
                    </div>
                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Facebook" wire:model.live.debounce.300ms='facebook'>
                </div>
                <div>

                    @error('facebook')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>

            {{-- website --}}
            <div>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <iconify-icon icon="iconoir:internet" style="color: blue;"></iconify-icon>
                    </div>
                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Website link" wire:model.live.debounce.300ms='website'>

                </div>
                <div>
                    @error('website')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>

        </div>


        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea wire:model.live.debounce.1000ms='description' rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here..."></textarea>
        @error('description')
            <x-form.error :$message />
        @enderror

        <div class="grid grid-cols-2 gap-5">
            {{-- image upload --}}

            <div class="flex flex-col items-center justify-center w-full">

                <label for="dropzone-file-one"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="bg-cover bg-center" alt="">
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
                    <input wire:model.live='image' id="dropzone-file-one" type="file" class="hidden mb-6" />
                    <div wire:loading wire:target="image">Uploading...</div>
                </label>


                <div>
                    @error('image')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>



            {{-- informations --}}

            <div>
                <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product or
                    Services</label>
                <input wire:model.live='product_service' type="text" id="product"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Product or Service">
                @error('product_service')
                    <x-form.error :$message />
                @enderror
                <label for="location"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                <input wire:model.live='location' type="text" id="location"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="area of locations">

                <div>
                    @error('location')
                        <x-form.error :$message />
                    @enderror
                </div>
                {{-- Company phone --}}
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                    Number</label>
                <input wire:model.live='contact_phone' type="phone" id="phone"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="phone number">

                @error('contact_phone')
                    <x-form.error :$message />
                @enderror


            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button wire:click ="cancel" type="button"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button  type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                Startup</button>

        </div>




    </form>

</div>
