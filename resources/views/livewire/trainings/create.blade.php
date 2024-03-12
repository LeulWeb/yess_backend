<div>
    <div class=" flex items-center ">


        <a wire:navigate href="{{ route('trainings.index') }}">
            <iconify-icon data-tooltip-target="tooltip-default" icon="ion:arrow-back" style="color: blue;"
                width="32"></iconify-icon>
        </a>
        <div id="tooltip-default" role="tooltip"
            class="absolute z-10 inpopular inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Go Back
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
    <article class="format lg:format-lg dark:format-invert mt-4  ml-6 mb-7">
        <h2>Create Trainings </h2>
    </article>

    <form wire:submit.prevent="create">
        <div class="grid grid-cols-2 gap-5">
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
            <div>
                <div class="mb-3">
                    {{-- title name --}}
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Title</label>
                    <input type="text" wire:model.live='title' id="title"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title">

                    @error('title')
                        <x-form.error :$message />
                    @enderror
                </div>



                {{-- traininer --}}


                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        a Trainer</label>
                    <select  wire:model.live.debounce.200ms="trainer_id"  id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($trainerList as $item)
                             <option value="{{$item->id}}">{{$item->id}} {{$item->name}}</option>
                        @endforeach
                    </select>                    

                    <label for="chapters" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Chapters</label>
                    <select  wire:model.live.debounce.200ms="chapterIds"  id="chapters"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($chapters as $item)
                             <option value="{{$item->id}}">{{$item->id}} {{$item->title}}</option>
                        @endforeach
                    </select>



                <div>
                    <label for="popular" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Popular
                    </label>
                    <input id="popular" type="checkbox" wire:model.defer="popular"
                        class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                    <label for="popular" class="ml-2 text-sm text-gray-700 dark:text-white">Popular</label>
                    @error('popular')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="youtube_links">YouTube Links</label>
                    <input type="url" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="youtube_links " wire:model.live.debounce.300ms='youtube_links'>
                </div>



            </div>

        </div>




        <div class="mb-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea wire:model.live.debounce.1000ms='description' rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."></textarea>
            @error('description')
                <x-form.error :$message />
            @enderror
        </div>


        <div class="grid grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button wire:click ="cancel" type="button" wire:click ="cancel"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                Training</button>

        </div>







    </form>
</div>
