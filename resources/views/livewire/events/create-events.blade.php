<div>
    <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">
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
                        placeholder=" The title of the events....">

                    @error('title')
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

                </div>


            </div>
           <div class="grid grid-cols-2 gap-4">
            <div >
                <label for="target_audience"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target Audences</label>
               <input wire:model.live='target_audience' type="text" id="target_audience"
                aria-describedby="helper-text-explanation"
                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Targeted Audences of the event.....">

                <div>
                   @error('target_audience')
                    <x-form.error :$message />
                   @enderror
                </div>

            </div>
            <div>

                    {{-- location name --}}
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Events
                        Location</label>
                    <input type="text" wire:model.live='location' id="location"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Place of events...">

                    @error('location')
                        <x-form.error :$message />
                    @enderror
            </div>

           </div>




                {{-- informations --}}

                <div>
                    <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coord
                       </label>
                    <input wire:model.live='coord' type="text" id="product"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Product or Service">
                    @error('coord')
                        <x-form.error :$message />
                    @enderror

                </div>


        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea wire:model.live.debounce.1000ms='description' rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here..."></textarea>
        @error('description')
            <x-form.error :$message />
        @enderror



        <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button type="button"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button  type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                Events</button>

        </div>




    </form>

</div>

