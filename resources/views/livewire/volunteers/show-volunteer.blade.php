<div class=" dark:text-white">

    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
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
            <button data-modal-target="{{ $volunteer->id }}" data-modal-toggle="{{ $volunteer->id }}" type="button"
                class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                Remove
            </button>




            <div id="{{ $volunteer->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{ $volunteer->id }}">
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
                                you sure you want to delete this {{ $volunteer->title }}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{ $volunteer->id }}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{ $volunteer->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <h2 class="text-4xl font-extrabold dark:text-white m-5">volunteer Companies</h2>
    </div>

    @if ($editMode)
        <div>
            <div>
                <form wire:submit.prevent='update()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">


                        {{-- First column --}}
                        <div class=" grid grid-cols-2 gap-4">
                            {{-- 1st --}}
                            <div>
                                {{-- Volunteer Title --}}
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Title</label>
                                <input type="text" wire:model.live='title' id="title"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="title">

                                @error('title')
                                    <x-form.error :$message />
                                @enderror




                            </div>
                            {{-- second --}}
                            <div>
                                <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Company
                                    Email</label>
                                <input type="email" wire:model.live='contact_email' id="contact_email"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="jhon@email.com">

                                @error('contact_email')
                                    <x-form.error :$message />
                                @enderror


                            </div>
                        </div>
                        <div class = "grid grid-cols-2 gap-4 mb-2">
                            {{--  Age Group  --}}
                            <div>
                                <label for="age_group"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                        class="hidden md:inline"></span> age_group</label>

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

                            {{--  Activity Type  --}}
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



                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea wire:model.live.debounce.1000ms='description' rows="4"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                    @error('description')
                        <x-form.error :$message />
                    @enderror

                    <div class="grid grid-cols-2 gap-5">
                        {{-- image upload --}}

                        <div class="flex flex-col items-center justify-center w-full">

                            <label for="dropzone-file-one"
                                class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="bg-cover bg-center w-full h-full" alt="">

                                    @elseif ($volunteer->image)
                                    <img src="{{ asset($volunteer->image) }}" class="bg-cover bg-center p-8 w-full h-full" alt="">


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
                                <input wire:model.live='image' id="dropzone-file-one" type="file" class="hidden mb-6 p-8  w-full h-full " />
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

                            {{--  start date  --}}
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">start_date
                                </label>
                            <input wire:model.live='start_date' type="text" id="start_date"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="start_date or Service">
                            @error('start_date')
                                <x-form.error :$message />
                            @enderror

                            {{--  end date  --}}
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">end_date
                            </label>
                        <input wire:model.live='end_date' type="text" id="end_date"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="end_date or Service">
                        @error('end_date')
                            <x-form.error :$message />
                        @enderror
                            {{--  locations  --}}
                            <label for="location"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <input wire:model.live='location' type="text" id="location"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com">

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
                                placeholder="name@flowbite.com">

                            @error('contact_phone')
                                <x-form.error :$message />
                            @enderror

                            {{--  status  --}}
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
        {{-- company info --}}

        <div
            class="w-full  p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <div class="flex w-10/12 mx-auto items-center place-content-between ">
                         {{--  Title  --}}
                <div>
                        <h5 class="mb-2  text-xl font-medium text-gray-900 dark:text-white">Title</h5>
                        <p class="fromat ml-3">{{ $volunteer->title }}</p>
                        <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">Location</h5>
                        <p class="fromat ml-3">{{ $volunteer->location }}</p>
                    </div>

                <div>
                    <div>
                        <p>Email</p>
                        <div>
                            <a class="flex space-x-1 items-center" href="mailto:{{ $volunteer->contact_email }}">
                                <iconify-icon icon="ic:outline-email"></iconify-icon>
                                <p>{{ $volunteer->contact_email }}</p>
                            </a>
                        </div>
                    </div>

                    <div class="my-2">
                        <p>Phone</p>
                        <div>
                            <div class="flex space-x-1 items-center">
                                <iconify-icon icon="solar:phone-outline"></iconify-icon>
                                <p>{{ $volunteer->contact_phone }}</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="grid grid-cols-2  gap-x-3">

                <img src="{{ asset($volunteer->image) }}" alt="" class ="flex flex-col items-center w-full h-full  p-6">
                <div class="format flex flex-col justify-center space-y-4 dark:text-white">
                    <h4 class = " dark:text-white">About Company</h4>
                    {{ $volunteer->description }}


                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white ">

                        <tbody>
                            {{--  start_date  --}}
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Start Date
                                </td>


                                <td class="px-6 py-4">
                                    {{ $volunteer->start_date }}
                                </td>

                            </tr>
                            {{--  end date  --}}
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    End Date
                                </td>

                                <td class="px-6 py-4">
                                    {{ $volunteer->end_date }}
                                </td>

                            </tr>
                            {{--  status  --}}
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    status
                                </td>

                                <td class="px-6 py-4">
                                    {{ $volunteer->status }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $volunteer->start_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $volunteer->end_date }}
                                </td>

                            </tr>
                            {{--  AGE GROUP  --}}
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Age Group
                                </td>

                                <td class="px-6 py-4">
                                    {{ $volunteer->age_group }}
                                </td>
                            </tr>
                            {{--  Activity Type  --}}
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Activity Type
                                </td>

                                <td class="px-6 py-4">
                                    {{ $volunteer->activity_type }}
                                </td>
                            </tr>


                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Location
                                </td>

                                <td class="px-6 py-4">
                                    {{ $volunteer->location }}
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

