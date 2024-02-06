<div>
    <div>

        {{-- controller header --}}

        <div class="flex items-center justify-between py-5">
            <div class=" flex items-center ">


                <a wire:navigate href="{{ route('sponsers.index') }}">
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
                <button data-modal-target="{{ $sponser->id }}" data-modal-toggle="{{ $sponser->id }}" type="button"
                    class="flex items-center space-x-1">
                    <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                    Remove
                </button>




                <div id="{{ $sponser->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="{{ $sponser->id }}">
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
                                    you sure you want to delete this {{ $sponser->organization }}?</h3>
                                <button wire:click='delete()' data-modal-hide="{{ $sponser->id }}" type="button"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-hide="{{ $sponser->id }}" type="button"
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
                        <div class="grid md:grid-cols-2 gap-5 items-center">


                            {{-- Second column --}}
                            <div class="">

                                <div class="flex items-center justify-center  w-32 h-32 rounded-full mb-3">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-32 h-32  border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            @if ($logo)
                                            <img class="bg-cover w-32 h-32 bg-center rounded-full" src="{{ $logo->temporaryUrl() }}"
                                            alt="Bordered avatar">
                                            @elseif($sponser->logo)
                                                <img class="bg-cover w-32 h-32 bg-center rounded-full" src="{{ asset($sponser->logo) }}"
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
                            <div class="w-full">

                                {{-- 1st --}}
                                <div>
                                    {{-- Organizations Name --}}
                                    <label for="organization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organization
                                        Name</label>
                                    <input type="text" wire:model.live='organization' id="organization"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="organization w-full">

                                    @error('organization')
                                        <x-form.error :$message />
                                    @enderror
                                    {{-- sponser phone --}}
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                        Number</label>
                                    <input wire:model.live='phone' type="phone" id="phone"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="+251921438822">

                                    @error('phone')
                                        <x-form.error :$message />
                                    @enderror

                                </div>






                            </div>

                        </div>



                        <div class="grid grid-cols-2 gap-5">

                            {{-- agreement_file upload --}}


                            <div class="flex flex-col items-center justify-center w-full">
                                <label for="agreement_file" class="block text-sm font-medium text-gray-700">Agreement File

                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        @if ($agreement_file)
                                      {{ $agreement_file  }}




                                        @endif
                                           <input id="agreement_file" type="file" wire:model="agreement_file" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                       <div wire:loading wire:target="agreement_file">Uploading...</div>
                                    </div>

                                </label>

                                <div>
                                    @error('agreement_file')
                                        <x-form.error :$message />
                                    @enderror
                                </div>

                            </div>

                            {{-- informations --}}

                            <div>

                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">sponser's
                                        Email</label>
                                    <input type="email" wire:model.live='email' id="email"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="jhon@email.com">
                                    @error('email')
                                        <x-form.error :$message />
                                    @enderror


                                <label for="organization_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organization Type</label>
                                <input wire:model.live='organization_type' type="text" id="organization_type"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Other">

                                <div>
                                    @error('organization_type')
                                        <x-form.error :$message />
                                    @enderror
                                </div>
                                {{-- Company phone --}}
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    Number</label>
                                <input wire:model.live='status' type="text" id="status"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="New">

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
                    <div class="flex flex-col items-center  ">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($sponser->logo) }}"
                            alt="Bonnie agreement_file" />
                        <div>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $sponser->name }}</h5>
                            <p class="fromat">{{ $sponser->organization }}</p>
                        </div>
                    </div>

                    {{-- contact info --}}
                    <div>
                        <div>
                            <p>Email</p>
                            <div>
                                <a class="flex space-x-1 items-center" href="mailto:{{ $sponser->email }}">
                                    <iconify-icon icon="ic:outline-email"></iconify-icon>
                                    <p>{{ $sponser->email }}</p>
                                </a>
                            </div>
                        </div>

                        <div class="my-2">
                            <p>Phone</p>
                            <div>
                                <div class="flex space-x-1 items-center">
                                    <iconify-icon icon="solar:phone-outline"></iconify-icon>
                                    <p>{{ $sponser->phone }}</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


                    <div class="format flex flex-col justify-center space-y-4">


                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">

                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                        Area_of_collaboration File
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $sponser->area_of_collaboration }}
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                      Agreement File
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $sponser->agreement_file}}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                      Status
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $sponser->status }}
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                        Organization Type
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $sponser->organization_type }}
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                    </div>

                    {{-- table data --}}


            </div>
        @endif



    </div>



    </div>


</div>
