<div>

    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
        <div class=" flex items-center ">


            <a wire:navigate href="{{ route('news.index') }}">
                <iconify-icon data-tooltip-target="tooltip-default" icon="ion:arrow-back" style="color: blue;"
                    width="32"></iconify-icon>
            </a>
            <div id="tooltip-default" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Go Back
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>


        </div>


        <div class="flex space-x-3 items-cetner">
            <button wire:click='toggleEdit()' class="flex items-center space-x-1">

                @if ($editMode)
                    <div class="flex items-center text-green-500">
                        <iconify-icon icon="carbon:view"></iconify-icon>
                        View
                    </div>
                @else
                    <div class="flex items-center text-blue-500">
                        <iconify-icon icon="iconamoon:edit-light" style="color: blue;"></iconify-icon>
                        Edit
                    </div>
                @endif


            </button>
            <button data-modal-target="{{ $new->id }}" data-modal-toggle="{{ $new->id }}" type="button"
                class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                Remove
            </button>




            <div id="{{ $new->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{ $new->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                you sure you want to delete this {{ $new->author }}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{ $new->id }}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{ $new->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




    @if ($editMode)
        <div>
            <div>
                <form wire:submit.prevent='update()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">

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
                                        @elseif($new->logo)
                                            <img class="bg-cover w-32 h-32 bg-center rounded-full" src="{{ asset($new->logo) }}"
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
                                {{-- Events Title --}}
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                   Event's Title</label>
                                <input type="text" wire:model.live='title' id="title"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="title">

                                @error('title')
                                    <x-form.error :$message />
                                @enderror


                                {{-- Author name --}}
                                <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Event's
                                    Author's Name</label>
                                <input type="text" wire:model.live='author' id="author"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Taye Animaw">

                                @error('author')
                                    <x-form.error :$message />
                                @enderror

                            </div>

                            {{-- second --}}

                            <div>
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Event's
                                    Date</label>
                                <input type="date" wire:model.live='date' id="date"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Events date">

                                @error('date')
                                    <x-form.error :$message />
                                @enderror

                                    <div>
                                        <label  for="empNum"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">visiblity <span
                                                class="hidden md:inline"></span></label>
                                        <input wire:model.live='is_visible' type="boolean" id="empNum" aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="true">

                                        @error('is_visible')
                                            <x-form.error :$message />
                                        @enderror
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
                        {{-- thumbnail upload --}}

                        <div class="flex flex-col items-center justify-center w-full">

                            <label for="dropzone-file-one"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if ($thumbnail)
                                    <img src="{{ $thumbnail->temporaryUrl() }}" class="bg-cover bg-center" alt="">

                                    @elseif ($new->thumbnail)
                                    <img src="{{ asset($new->thumbnail) }}" class="bg-cover bg-center" alt="">



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
                                <div wire:loading wire:target="thumbnail">Uploading...</div>
                            </label>


                            <div>
                                @error('thumbnail')
                                    <x-form.error :$message />
                                @enderror
                            </div>

                        </div>



                        {{-- informations --}}

                        <div>
                            <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Features </label>
                            <input wire:model.live='featured' type="text" id="featured"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="featured or Service">
                            @error('featured')
                                <x-form.error :$message />
                            @enderror
                            <label for="tags"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                            <input wire:model.live='tags' type="text" id="tags"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tag contents...">

                            <div>
                                @error('tags')
                                    <x-form.error :$message />
                                @enderror
                            </div>
                            {{-- Events links --}}
                            <label for="links" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">links
                                </label>
                            <input wire:model.live='links' type="url" id="links"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="link">

                            @error('links')
                                <x-form.error :$message />
                            @enderror


                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
                        <button wire:click ="cancel" type="button"
                            class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                        <button  type="submit"
                            class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save Changes</button>

                    </div>




                </form>

            </div>

        </div>
    @else
        {{-- Events info --}}

        <div
            class="w-full  p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <div class="w-10/12 mx-auto items-center grid grid-cols-2">
                <div class="d items-center  ">
                    <img class="w-30 h-30 mb-3 rounded-full shadow-lg" src="{{ asset($new->logo) }}"
                        alt="Bonnie thumbnail" />

                </div>

                {{-- events info --}}
                <div class =" text-start mr-50">
                    <div>
                        <h4  class ="text-xl">Event's Title </h4>
                        <p class="">{{ $new->title }}</p>

                        <h4 class ="text-xl">Author's Name </h4>
                        <p class="">{{ $new->author }}</p>
                    </div>
                    <div>
                        <h4 class ="text-xl">Date</h4>
                        <div>

                                <p class="">{{ $new->date }}</p>

                        </div>
                    </div>

                    <div class="my-2">
                        <h4 class ="text-xl">About links's</h4>
                        <div>
                            <div class="flex space-x-1 items-center  ">

                                <p>{{ $new->links }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="grid grid-cols-2  gap-x-3">
                <img class="text-center w-full h-full" src="{{ asset($new->thumbnail) }}"
                        alt="Bonnie thumbnail" />
                <div class="format flex flex-col justify-center space-y-4">
                    <h4>About Event's</h4>
                    {{ $new->description }}

                    <h4>featured </h4>
                    {{ $new->featured }}


                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">

                        <tbody>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                    Visibility
                                </td>

                                <td class="px-6 py-4">
                                    {{ $new->is_visible }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                    Tags
                                </td>

                                <td class="px-6 py-4">
                                    {{ $new->tags }}
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>

                {{-- table data --}}
            </div>

        </div>
    @endif



</div>



</div>

