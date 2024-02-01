<div>
    <div class=" flex items-center ">


        <a wire:navigate href="{{ route('jobs.index') }}">
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
        <h2>Create Jobs </h2>
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
                    {{-- Jobs Name --}}
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jobs
                        Title</label>
                    <input type="text" wire:model.live='title' id="title"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="the title of the job...">

                    @error('title')
                        <x-form.error :$message />
                    @enderror


                    {{-- contact_address name --}}
                    <label for="contact_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Jobs
                        contact_address</label>
                    <input type="text" wire:model.live='contact_address' id="contact_address"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your address">

                    @error('contact_address')
                        <x-form.error :$message />
                    @enderror

                </div>

                {{-- second --}}

                <div>
                    <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Jobs
                        Email</label>
                    <input type="email" wire:model.live='contact_email' id="contact_email"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="taye@email.com">

                    @error('contact_email')
                        <x-form.error :$message />
                    @enderror


                    <div class="grid grid-cols-2 gap-3">
                        {{--  jobs sector  --}}


                        <div>
                            <label for="sector"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="hidden md:inline">Jobs</span> Sector</label>

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

                        {{--  schedule  --}}
                        <div>
                            <label for="schedule"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="hidden md:inline">Jobs</span> schedule</label>

                            <select wire:model.live='schedule' id="schedule"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($JobSchedule as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
                            </select>


                            @error('schedule')
                                <x-form.error :$message />
                            @enderror


                        </div>

                    </div>

                </div>


            </div>

        </div>



        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Social
            Informations</label>
        <div class="grid grid-cols-4 gap-5">

            <div>
                {{-- experience --}}
                <div class="relative mb-6 flex flex-col">


                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="experience" wire:model.live.debounce.300ms='experience'>

                </div>
                <div>
                    @error('experience')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>


            {{-- deadline --}}
            <div>
                <div class="relative mb-6">

                    <input type="date" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="deadline" wire:model.live.debounce.300ms='deadline'>

                </div>
                <div>
                    @error('deadline')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>


            {{-- salary_compensation --}}
            <div>
                <div class="relative mb-6">

                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="salary_compensation" wire:model.live.debounce.300ms='salary_compensation'>
                </div>
                <div>

                    @error('salary_compensation')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>

            {{-- opportunities --}}
            <div>
                <div class="relative mb-6">

                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="opportunities " wire:model.live.debounce.300ms='opportunities'>

                </div>
                <div>
                    @error('opportunities')
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


            {{-- note --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note
                    </label>
                 <input wire:model.live='note' type="text" id="note"
                     aria-describedby="helper-text-explanation"
                     class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     placeholder="note">
                 @error('note')
                     <x-form.error :$message />
                 @enderror
                </div>
                {{--  vacancies  --}}
                <div>
                    <label  for="vacancies"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vacancies <span
                            class="hidden md:inline"></span></label>
                    <input wire:model.live='vacancies' type="number" id="vacancies" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="30">

                    @error('vacancies')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>



               <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="location"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                   <input wire:model.live='location' type="text" id="location"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="location">

                   <div>
                    @error('location')
                        <x-form.error :$message />
                    @enderror
                   </div>
                </div>
                <div>
                    {{-- phone --}}
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                    Number</label>
                <input wire:model.live='contact_phone' type="phone" id="phone"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your phone">

                @error('contact_phone')
                    <x-form.error :$message />
                @enderror

                </div>

               </div>




        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="requirements"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Requirements</label>
                <input wire:model.live='requirements' type="text" id="requirements"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="requirements">

                <div>
                    @error('requirements')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>
            <div>
                <label for="responsibilities"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsibilities</label>
            <input wire:model.live='responsibilities' type="text" id="responsibilities"
                aria-describedby="helper-text-explanation"
                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="responsibilities">

            <div>
                @error('responsibilities')
                    <x-form.error :$message />
                @enderror
            </div>

            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button type="button"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button  type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                job</button>

        </div>




    </form>

</div>

