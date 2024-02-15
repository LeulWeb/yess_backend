<div class=" dark:text-white">

    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
        <div class=" flex items-center ">

            <a wire:navigate href="{{ route('users.index') }}">
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

            @if ($user->role == 'user')
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Promote to Member
                </button>
            @else
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="block text-white bg-gray-200 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-900 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Demote to User
                </button>
            @endif





            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Promote to Memember
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        @if ($user->role == 'user')
                            <div class="p-4 md:p-5 space-y-4">
                                Before proceeding, please consider the following: Are you sure you want to change to
                                {{ $user->name }} to a member status? While this action is reversible, it's essential
                                to
                                ensure
                                {{ $user->name }} meets the criteria for becomin active member of YESS Ethiopia. By
                                confirming, you acknowledge
                                that
                                {{ $user->name }} will become a member of YESS community. Please confirm to proceed
                                and
                                empower{{ $user->name }}
                                within
                                our community
                            </div>
                        @else
                            <div class="p-4 md:p-5 space-y-4">
                                Before proceeding, please consider the following: Are you sure you want to demote
                                {{ $user->name }} from a member status? While this action is reversible, it's
                                essential to ensure {{ $user->name }} no longer requires the privileges associated
                                with being an active member of YESS Ethiopia. By confirming, you acknowledge that
                                {{ $user->name }} will be removed as a member from the YESS community. Please confirm
                                to proceed and adjust {{ $user->name }}'s status within our community.
                            </div>
                        @endif


                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button wire:click="toggleRole()" data-modal-hide="default-modal" type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                accept</button>
                            <button data-modal-hide="default-modal" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                        </div>
                    </div>
                </div>
            </div>




            {{-- Modal to ban user --}}

            @if ($user->status == 'active')
                <!-- Modal toggle -->
                <button data-modal-target="static-ban" data-modal-toggle="static-ban"
                    class="block text-red-500   focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  "
                    type="button">

                    <div class="flex items-center space-x-1">
                        <iconify-icon icon="ion:ban-outline" width="16" height="16"></iconify-icon>
                        <p>Ban User</p>
                    </div>
                </button>

                <!-- Main modal -->
                <div id="static-ban" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Are you sure you want to ban {{ $user->name }}
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="static-ban">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">

                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Hey {{ Auth::user()->name }}! Before you proceed to ban a user, take a moment to
                                    confirm
                                    this action. Banning is a powerful tool, and we want to ensure it's used
                                    judiciously.
                                    Confirm that the user's behavior warrants this step, and let's maintain a positive
                                    and
                                    inclusive community. Thanks for your diligence!
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="static-ban" type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>
                                <button wire:click="toggleBan()" data-modal-hide="static-ban" type="button"
                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">I
                                    accept</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Modal toggle -->
                <button data-modal-target="static-ban" data-modal-toggle="static-ban"
                    class="block text-blue-500   focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  "
                    type="button">

                    <div class="flex items-center space-x-1">
                        <iconify-icon icon="ion:ban-outline" width="16" height="16"></iconify-icon>
                        <p>UnBan User</p>
                    </div>
                </button>

                <!-- Main modal -->
                <div id="static-ban" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Are you sure you want to unban {{ $user->name }}
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="static-ban">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">

                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Hey {{ Auth::user()->name }}! Before you proceed to unban a user, please confirm
                                    this action. Unbanning grants the user access back to our platform, so let's ensure
                                    it's the right decision. Double-check the situation and ensure that unbanning aligns
                                    with our community guidelines. Thank you for your attention to detail!
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button wire:click="toggleBan()" data-modal-hide="static-ban" type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                    accept</button>
                                <button data-modal-hide="static-ban" type="button"
                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif






            {{--  --}}
            <button data-modal-target="{{ $user->id }}" data-modal-toggle="{{ $user->id }}" type="button"
                class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                Remove
            </button>




            <div id="{{ $user->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{ $user->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
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
                                you sure you want to delete this {{ $user->name }}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{ $user->id }}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{ $user->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>

    </div>



    <section class="my-12">


        <div
            class="w-full  p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <div class="flex w-10/12 mx-auto items-center place-content-between ">
                <div class="flex flex-col items-center  ">



                    @if (isset($user->profile_picture))
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/{{ $user->profile_picture }}"
                            alt="Bonnie image" />
                    @else
                        <div class="w-24 h-24 rounded-full bg-gray-400 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5M8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0M12 12.25c-2.313 0-4.445.526-6.024 1.414C4.42 14.54 3.25 15.866 3.25 17.5v.102c-.001 1.162-.002 2.62 1.277 3.662c.629.512 1.51.877 2.7 1.117c1.192.242 2.747.369 4.773.369s3.58-.127 4.774-.369c1.19-.24 2.07-.605 2.7-1.117c1.279-1.042 1.277-2.5 1.276-3.662V17.5c0-1.634-1.17-2.96-2.725-3.836c-1.58-.888-3.711-1.414-6.025-1.414M4.75 17.5c0-.851.622-1.775 1.961-2.528c1.316-.74 3.184-1.222 5.29-1.222c2.104 0 3.972.482 5.288 1.222c1.34.753 1.961 1.677 1.961 2.528c0 1.308-.04 2.044-.724 2.6c-.37.302-.99.597-2.05.811c-1.057.214-2.502.339-4.476.339c-1.974 0-3.42-.125-4.476-.339c-1.06-.214-1.68-.509-2.05-.81c-.684-.557-.724-1.293-.724-2.601"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif
                    <div>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}
                        </h5>
                        <p class="fromat">{{ $user->bio }}</p>

                    </div>
                </div>

                {{-- contact info --}}
                <div>
                    <div>
                        <p>Email</p>
                        <div>
                            <a class="flex space-x-1 items-center" href="mailto:{{ $user->email }}">
                                <iconify-icon icon="ic:outline-email"></iconify-icon>
                                <p>{{ $user->email }}</p>
                            </a>
                        </div>
                    </div>

                    <div class="my-2">
                        <p>Phone</p>
                        <div>
                            <div class="flex space-x-1 items-center">
                                <iconify-icon icon="solar:phone-outline"></iconify-icon>
                                <p>{{ $user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="inline-flex items-center justify-center w-full my-12">
                <hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <span
                    class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">About
                    {{ $user->name }}</span>
            </div>
            <div class="grid grid-cols-6  gap-x-8">


                <div class="col-span-2">
                    <div class="py-2 dark:text-gray-100 ">Location</div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white ">

                        <tbody>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Country
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->country }}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Region
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->region }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    City
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->city }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="format flex flex-col justify-center space-y-4 col-span-4 dark:text-white">
                    <div class="py-2 dark:text-gray-100 ">About</div>

                    <h4 class = " dark:text-white">Skill</h4>
                    {{ $user->skill }}

                    <h4 class = " dark:text-white">Interest</h4>
                    {{ $user->interest }}


                    <h4 class = " dark:text-white">Story</h4>
                    {{ $user->story }}




                </div>

                {{-- table data --}}
            </div>

            @if (isset($user->education))
                <div class="inline-flex items-center justify-center w-full my-12">
                    <hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <span
                        class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Education</span>
                </div>

                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white ">

                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Education Level
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->education->education_level }}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Field of Study
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->education->field_of_study }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Award
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->education->award }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Achivment
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->education->achievement }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            @endif




        </div>
</div>
</section>






</div>



</div>
