<div>

    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
        <div class=" flex items-center ">


            <a wire:navigate href="{{ route('subscribers.index') }}">
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
            <button data-modal-target="{{ $subscriber->id }}" data-modal-toggle="{{ $subscriber->id }}" type="button"
                class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                Remove
            </button>




            <div id="{{ $subscriber->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{ $subscriber->id }}">
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
                                you sure you want to delete this {{ $subscriber->name }}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{ $subscriber->id }}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{ $subscriber->id }}" type="button"
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


                        {{-- First column --}}
                        <div class="col-span-5 grid grid-cols-2 gap-3">

                            {{-- 1st --}}
                            <div>
                                {{-- susbcriber Name --}}
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subscriber
                                    Name</label>
                                <input type="text" wire:model.live='name' id="name"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="subscribers name....">

                                @error('name')
                                    <x-form.error :$message />
                                 @enderror

                            </div>

                            {{-- second --}}

                            <div>
                                <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Subscribers
                                    Email</label>
                                <input type="email" wire:model.live='email' id="contact_email"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="jhon@email.com">

                                @error('email')
                                    <x-form.error :$message />
                                @enderror


                            </div>


                        </div>

                    </div>

                    <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-7">
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


                {{-- contact info --}}
                <div>
                    <div grid grid-cols-2 gap-5>

                        <p class ="text-xl">Subscriber's Name</p>
                        <p>{{ $subscriber->name }}</p>

                    </div>
                    <div>
                        <p class="text-xl"> Subscriber's Email</p>
                                <p>{{ $subscriber->email }}</p>


                    </div>
                </div>
            </div>
                </div>


            </div>

        </div>
    @endif



</div>



</div>
