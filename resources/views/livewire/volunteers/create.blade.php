<div>
    <div class=" flex items-center ">


        <a wire:navigate href="{{ route('volunteers.index') }}">
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
        <h2>Create Volunteers </h2>
    </article>

    <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">
        <div class="grid md:grid-cols-2 gap-5 items-center">


            {{-- Second column --}}

            {{-- First column --}}
            <div class="col-span-5 grid grid-cols-2 gap-3">

                {{-- 1st --}}
                <div>
                    {{-- title Name --}}
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Title</label>
                    <input type="text" wire:model.live='title' id="title"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title.....">

                    @error('title')
                        <x-form.error :$message />
                    @enderror

                    {{-- target_community title --}}
                    <label for="target_community" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                        Target_community</label>
                    <input type="text" wire:model.live='target_community' id="target_community"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Targeted Community.....">

                    @error('target_community')
                        <x-form.error :$message />
                    @enderror

                </div>



                <div>
                    <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Company
                        Email</label>
                    <input type="email" wire:model.live='contact_email' id="contact_email"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="taye@email.com">

                    @error('contact_email')
                        <x-form.error :$message />
                    @enderror


                    <div class="grid grid-cols-2 gap-3">


                        <div>
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="hidden md:inline"></span> status</label>

                            <select wire:model.live='status' id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($Status as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
                            </select>


                            @error('status')
                                <x-form.error :$message />
                            @enderror


                        </div>
                        <div>
                            <label for="activity_type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="hidden md:inline">Activity</span> Type</label>

                            <select wire:model.live='activity_type' id="activity_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($VolunteerActivities as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
                            </select>

                            @error('activity_type')
                                <x-form.error :$message />
                            @enderror


                        </div>





                    </div>

                </div>


            </div>


        </div>
            {{--  Two Datas  --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label  for="date"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start <span
                        class="hidden md:inline">Date</span></label>
                <input wire:model.live='start_date' type="date" id="date" aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="start date">

                @error('start_date')
                    <x-form.error :$message />
                @enderror
            </div>
            {{--  End Date  --}}

            <div>
                <label  for="date"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End <span
                        class="hidden md:inline">Date</span></label>
                <input wire:model.live='end_date' type="date" id="date" aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="end date">

                @error('end_date')
                    <x-form.error :$message />
                @enderror
            </div>
        </div>






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
                </label>


                <div>
                    @error('image')
                        <x-form.error :$message />
                    @enderror



                </div>

            </div>

            {{-- informations --}}

            <div>

                <label for="location"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                <input wire:model.live='location' type="text" id="location"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Location of volunteer">

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
                    placeholder="like +251921438827">

                @error('contact_phone')
                    <x-form.error :$message />
                @enderror




                    <div>
                        <label for="age_group"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                class="hidden md:inline">Age</span> Group</label>

                        <select wire:model.live='age_group' id="age_group"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($AgeGroup as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>


                        @error('age_group')
                            <x-form.error :$message />
                        @enderror

                    </div>



            </div>
        </div>
         {{--  description  --}}
         <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea wire:model.live.debounce.1000ms='description' rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."></textarea>
            @error('description')
                <x-form.error :$message />
            @enderror
        </div>


        <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button wire:click ="cancel" type="button"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button  type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                volunteer</button>

        </div>




    </form>

</div>

