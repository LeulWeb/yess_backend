<div>
    <div class=" flex items-center ">


        <a wire:navigate href="{{ route('chapters.index') }}">
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
        <h2>Create chapters </h2>
    </article>

    <form wire:submit.prevent="create">
        
            
            
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
                    <label for="training_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        a Training</label>
                    <select  wire:model.live.debounce.200ms="training_id"  id="training_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($trainingList as $item)
                             <option value="{{$item->id}}">{{$item->id}} {{$item->title}}</option>
                        @endforeach
                    </select>               

                <div>
                    <label for="youtube_links">YouTube Links</label>
                    @foreach ($youtube_links as $index => $link)
                        <div>
                            <input type="url" id="input-group-1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="YouTube Link" wire:model.lazy="youtube_links.{{ $index }}">
                            {{-- <button wire:click.prevent="removeYoutubeLink({{ $index }})"
                                class="text-red-500 hover:text-red-600 focus:outline-none">Remove</button> --}}
                        </div>
                    @endforeach
                    <button wire:click.prevent="addYoutubeLink"
                        class="text-blue-500 hover:text-blue-600 focus:outline-none">Add Link</button>
                    @error('youtube_links.*')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
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
                chapter</button>

        </div>







    </form>
</div>
