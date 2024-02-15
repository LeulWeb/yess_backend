<div class=" dark:text-white">
    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
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
            <button data-modal-target="{{ $job->id }}" data-modal-toggle="{{ $job->id }}" type="button"
                class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                Remove
            </button>




            <div id="{{ $job->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{ $job->id }}">
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
                                you sure you want to delete this {{ $job->title }}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{ $job->id }}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{ $job->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <h2 class="text-4xl font-extrabold dark:text-white m-5">Job Listings</h2>
    </div>

    @if ($editMode)


    <form wire:submit.prevent='update()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">
        <div>
            <div class="grid md:grid-cols-6 gap-5 items-center">

                <div class="">

                    <div class="flex items-center justify-center  w-32 h-32 rounded-full mb-3">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-32 h-32  border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                @if ($logo)
                                <img class="bg-cover w-32 h-32 bg-center rounded-full" src="{{ $logo->temporaryUrl() }}"
                                alt="Bordered avatar">
                                @elseif($job->logo)
                                    <img class="bg-cover w-32 h-32 bg-center rounded-full" src="{{ asset($job->logo) }}"
                                        alt="">
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

                <div class="col-span-5 grid grid-cols-2 gap-3">

                    {{-- 1st --}}
                    <div>
                        {{-- Jobs title --}}
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jobs
                            Title</label>
                        <input type="text" wire:model.live='title' id="title"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="title">

                        @error('title')
                            <x-form.error :$message />
                        @enderror


                        {{-- contact_address title --}}
                        <label for="contact_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                            Contact Address</label>
                        <input type="text" wire:model.live='contact_address' id="contact_address"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="your address">

                        @error('contact_address')
                            <x-form.error :$message />
                        @enderror

                    </div>

                    {{-- second --}}

                    <div>
                        <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
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
                                <label for="sector"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                        class="hidden md:inline">Job</span> Sector</label>

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
                               <label for="schedule"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                       class="hidden md:inline"></span> Schedule</label>

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
            <div class="grid grid-cols-4 gap-5">

                <div>
                    {{-- locations --}}
                    <div class="relative mb-6 flex flex-col">
                        <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                        </label>

                        <input type="text" id="input-group-1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="location" wire:model.live.debounce.300ms='location'>

                    </div>
                    <div>
                        @error('location')
                            <x-form.error :$message />
                        @enderror
                    </div>

                </div>

                {{-- salary_compensation --}}
                <div>
                    <div class="relative mb-6">
                        <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary Componsation
                        </label>

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

                {{-- experiance --}}
                <div>
                    <div class="relative mb-6">
                        <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experiances
                        </label>
                        <input type="numeric" id="input-group-1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="experiance" wire:model.live.debounce.300ms='experiance'>

                        @error('experiance')
                            <x-form.error :$message />
                        @enderror
                    </div>
                </div>
                {{-- opportunities --}}
                <div>
                    <div class="relative mb-6">
                        <label for="opportunities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opportunities
                        </label>
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

            <div class="grid grid-cols-3 gap-4">

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
                <div>
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
                {{-- deadline --}}
                <div>
                    {{--  deadline  --}}
                    <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">deadline
                        </label>
                    <input wire:model.live='deadline' type="text" id="deadline"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="deadline">

                    @error('deadline')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>

            <div class="grid grid-cols-2 gap-5">

                <div>
                    <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsibility  </label>
                    <input wire:model.live='responsibilities' type="text" id="product"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Product or Service">
                    @error('responsibilities')
                        <x-form.error :$message />
                    @enderror
                </div>
                   <div>

                    {{--  requirements  --}}
                    <label for="requirements" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">requirements
                        </label>
                    <input wire:model.live='requirements' type="text" id="requirements"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="requierments">

                    @error('requirements')
                        <x-form.error :$message />
                    @enderror
                   </div>
            </div>
            <div>
                {{--  note  --}}
                    <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">note
                        </label>
                    <input wire:model.live='note' type="text" id="note"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="note">

                    @error('note')
                        <x-form.error :$message />
                    @enderror

            </div>
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
                    class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                    Cancel
                </button>
                <button  type="submit"
                    class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Save Changes
                </button>

            </div>

        </div>






    </form>

    @else
        {{-- Job info --}}

        <div class="w-full  p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <div class="flex w-10/12 mx-auto place-content-between ">
                <div class="grid grid-cols-3  ">
                    <div>
                        <img class="w-24 h-24 mb-3 rounded-full justify-start shadow-lg" src="{{ asset($job->logo) }}"
                        alt="" />

                     </div>

                        <div>
                            <h2 class = " dark:text-white text-xl">Job Title </h2>
                            <h5 class="mb-1  font-medium text-gray-900 dark:text-white">{{ $job->title }}</h5>
                            <h2 class = " dark:text-white text-xl">Contact Address </h2>
                            <p> {{ $job->contact_address }} </p>

                        </div>
                </div>





                {{-- contact info --}}
                <div>
                    <div>
                        <p>Email</p>
                        <div>
                            <a class="flex space-x-1 items-center" href="mailto:{{ $job->contact_email }}">
                                <iconify-icon icon="ic:outline-email"></iconify-icon>
                                <p>{{ $job->contact_email }}</p>
                            </a>
                        </div>
                    </div>

                    <div class="my-2">
                        <p>Phone</p>
                        <div>
                            <div class="flex space-x-1 items-center">
                                <iconify-icon icon="solar:phone-outline"></iconify-icon>
                                <p>{{ $job->contact_phone }}</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>



            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="grid grid-cols-2 gap-8 ">


                    <div>

                        <h2 class = " dark:text-white text-xl mt-2">About Company</h2>
                       <p>{{ $job->description }}</p>
                       <h1 class = " dark:text-white text-xl mt-2">Responsiblities</h1>
                        <p>{{ $job->location }}</p>
                       <h2 class = " dark:text-white text-xl mt-2">Location</h2>
                      <p> {{ $job->responsibilities }} </p>

                    </div>
                <div class=" dark:text-white  text-center">
                    <h1 class = " dark:text-white text-xl mt-2"> Job Sector</h1>
                       <p>{{ $job->sector }} </p>
                       <h1 class = " dark:text-white text-xl mt-2">Deadline Date </h1>
                       <p>{{ $job->deadline }}</p>
                       <h1 class = " dark:text-white text-xl mt-2"> Job Vacancies</h1>
                      <p> {{ $job->vacancies }}</p>
                       <h1 class = " dark:text-white text-xl mt-2"> Job Schedule</h1>
                       <p>{{ $job->schedule }} </p>
                       <h1 class = " dark:text-white text-xl mt-2"> Year of Experiance</h1>
                       <p>{{ $job->experiance }} </p>


                </div>
            </div>
        </div>

    @endif



</div>





