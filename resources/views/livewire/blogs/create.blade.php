
    <div>
        <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">

                      {{-- First column --}}
                <div class="col-span-5 grid grid-cols-2 gap-6">
                    <div>
                        {{-- blog title --}}
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog's Title</label>
                        <input type="text" wire:model.live='title' id="title"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="title...">

                        @error('title')
                            <x-form.error :$message />

                        @enderror
                    </div>

                    {{-- second --}}

                    <div>
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Author's Name
                            </label>
                        <input type="text" wire:model.live='author' id="author"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Authors name">

                        @error('author')
                            <x-form.error :$message />
                        @enderror

                    </div>


                </div>




            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Conetent</label>
            <textarea wire:model.live.debounce.1000ms='content' rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write the  content here..."></textarea>
            @error('content')
                <x-form.error :$message />
            @enderror

            <div class="col-span-5 grid grid-cols-2  gap-5">
                {{-- image upload --}}

                <div class="flex flex-col items-center justify-center w-full">

                    <label for="dropzone-file-one"
                        class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
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

                <div>
                    <label  for="tag"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blogs  <span
                            class="hidden md:inline">Tag</span></label>
                    <input wire:model.live='tag' type="text" id="tag" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="put the tag here...">

                    @error('tag')
                        <x-form.error :$message />
                    @enderror
                    <div>
                          {{-- blog Category --}}
                          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white "> Blog's Category
                        </label>
                    <input type="text" wire:model.live='category' id="category"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter category..">

                    @error('category')
                        <x-form.error :$message />
                    @enderror
                    </div>
                </div>

            </div>



            <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
                <button wire:click = "cancel" type="button"
                    class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                <button  type="submit"
                    class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                    Blog</button>

            </div>
        </form>

    </div>




