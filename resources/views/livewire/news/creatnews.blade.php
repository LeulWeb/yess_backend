<div>
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
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Events
                        Title</label>
                    <input type="text" wire:model.live='title' id="title"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Acme">

                    @error('title')
                        <x-form.error :$message />
                    @enderror


                    {{-- author name --}}
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Events
                        Author</label>
                    <input type="text" wire:model.live='author' id="author"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Jhone Doe">

                    @error('author')
                        <x-form.error :$message />
                    @enderror

                </div>

                {{-- second --}}

                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                        Date of Events</label>
                    <input type="date" wire:model.live='date' id="date"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter the date...">

                    @error('date')
                        <x-form.error :$message />
                    @enderror


                    <div class="">


                        <div>
                            <label  for="visible"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visiblity <span
                                    class="hidden md:inline"></span></label>
                            <input wire:model.live='is_visible' type="boolean" id="visible" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="true">

                            @error('is_visible')
                                <x-form.error :$message />
                            @enderror
                        </div>
                    </div>

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
                        @if ($thumbnail)
                            <img src="{{ $thumbnail->temporaryUrl() }}" class="bg-cover bg-center" alt="">
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
                    <input wire:model.live='thumbnail' id="dropzone-file-one" type="file" class="hidden mb-6" />

                </label>
                <div wire:loading wire:target="thumbnail">Uploading...</div>


                <div>
                    @error('thumbnail')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>



            {{-- informations --}}

            <div>
                <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Features
                   </label>
                <input wire:model.live='featured' type="text" id="product"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Product or Service">
                @error('featured')
                    <x-form.error :$message />
                @enderror
                <label for="tags"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                <input wire:model.live='tags' type="text" id="tags"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com">

                <div>
                    @error('tags')
                        <x-form.error :$message />
                    @enderror
                </div>
                {{-- Events links --}}
                <label for="links" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Links
                    </label>
                <input wire:model.live='links' type="links" id="links"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com">

                @error('links')
                    <x-form.error :$message />
                @enderror


            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button wire:click ="cancel" type="button"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button  type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                News</button>

        </div>




    </form>

</div>
