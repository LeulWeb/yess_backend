<div>


    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
        <div class=" flex items-center ">


            <a wire:navigate href="{{ route('startups.index') }}">
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
            <div class="flex items-center space-x-1">
                <iconify-icon icon="iconamoon:edit-light" style="color: blue;" ></iconify-icon>
                Edit
            </div>
            <button   data-modal-target="{{$startup->id}}" data-modal-toggle="{{$startup->id}}" type="button"  class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;" ></iconify-icon>
                Remove
            </button>




            <div id="{{$startup->id}}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{$startup->id}}">
                            <svg class="w-3 h-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                you sure you want to delete this {{$startup->name}}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{$startup->id}}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{$startup->id}}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




    {{-- company info --}}

    <div class="w-full  p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <div class="flex w-10/12 mx-auto items-center place-content-between ">
            <div class="flex flex-col items-center  ">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $startup->logo }}" alt="Bonnie image" />
                <div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $startup->name }}</h5>
                    <p class="fromat">{{ $startup->founder }}</p>
                </div>
            </div>

            {{-- contact info --}}
            <div>
                <div>
                    <p>Email</p>
                    <div>
                        <a class="flex space-x-1 items-center" href="mailto:{{ $startup->contact_email }}">
                            <iconify-icon icon="ic:outline-email"></iconify-icon>
                            <p>{{ $startup->contact_email }}</p>
                        </a>
                    </div>
                </div>

                <div class="my-2">
                    <p>Phone</p>
                    <div>
                        <div class="flex space-x-1 items-center">
                            <iconify-icon icon="solar:phone-outline"></iconify-icon>
                            <p>{{ $startup->contact_phone }}</p>
                        </div>
                    </div>
                </div>


                <div class="flex item-center space-x-2">
                    <a href="{{ $startup->linkedin }}">
                        <iconify-icon icon="skill-icons:linkedin"></iconify-icon>
                    </a>
                    <a href="{{ $startup->telegram }}">
                        <iconify-icon icon="logos:telegram"></iconify-icon>
                    </a>
                    <a href="{{ $startup->facebook }}">
                        <iconify-icon icon="logos:facebook"></iconify-icon>
                    </a>
                    <a href="{{ $startup->website }}">
                        <iconify-icon icon="iconoir:internet" style="color: blue;"></iconify-icon>
                    </a>


                </div>
            </div>
        </div>



        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        <div class="grid grid-cols-2  ">
            <img src="{{ $startup->image }}" alt="">
            <div class="format flex flex-col justify-center space-y-4">
                <h4>About Company</h4>
                {{ $startup->description }}

                <h4>Product Or Service</h4>
                {{ $startup->product_service }}


                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">

                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                Industry/Sector
                            </td>

                            <td class="px-6 py-4">
                                {{ $startup->sector }}
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                Employee Number
                            </td>

                            <td class="px-6 py-4">
                                {{ $startup->employees }}
                            </td>
                        </tr>

                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-black dark:text-whtie">
                                Location
                            </td>

                            <td class="px-6 py-4">
                                {{ $startup->location }}
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

            {{-- table data --}}




        </div>

    </div>
</div>



</div>
