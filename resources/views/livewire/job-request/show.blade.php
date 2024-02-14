<div class=" dark:text-white">

    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
        <div class=" flex items-center ">

            <a wire:navigate href="{{ route('job-request.index') }}">
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

                {{--  @if ($editMode)  --}}
                    <div class="flex items-center text-green-500">
                        <iconify-icon icon="carbon:view"></iconify-icon>
                        View
                    </div>
                {{--  @else
                    <div class="flex items-center text-blue-500">
                        <iconify-icon icon="iconamoon:edit-light" style="color: blue;"></iconify-icon>
                        Edit
                    </div>  --}}



            </button>
            <button data-modal-target="{{ $jobRequest->id }}" data-modal-toggle="{{ $jobRequest->id }}" type="button"
                class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                Remove
            </button>




            <div id="{{ $jobRequest->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{ $jobRequest->id }}">
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
                                you sure you want to delete this {{ $jobRequest->id }}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{ $jobRequest->id }}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{ $jobRequest->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <h2 class="text-4xl font-extrabold dark:text-white m-5">Job Request Lists</h2>
    </div>

        {{-- jobRequests info --}}

        <div
            class="w-full  p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <div class="format flex flex-col justify-center space-y-4 dark:text-white ml-11">
                    @if (isset($jobRequest->user))
                    <h4 class = " dark:text-white"> User's Name </h4>
                     <li>   {{ $jobRequest->user->name }}</li>
                     <h4 class = " dark:text-white"> User's Email </h4>
                     <li>   {{ $jobRequest->user->email }}</li>


                    @endif


                    <h4 class = " dark:text-white"> jobRequest's Position </h4>
                     <li>   {{ $jobRequest->position }}</li>

                    <h4 class = " dark:text-white"> <iconify-icon icon="skill-icons:linkedin"></iconify-icon>Linkdin</h4>
                    <a href="{{ $jobRequest->linkedIn }}">{{ $jobRequest->linkedIn }}</a>
                    <h4 class = " dark:text-white">  Resume</h4>
                    <a href="{{ $jobRequest->resume }}">{{ $jobRequest->resume }}</a>
                    <h4 class = " dark:text-white">  Job Type</h4>
                    {{ $jobRequest->job_type }}
                    <h4 class = " dark:text-white">  field Of Study</h4>
                    {{ $jobRequest->fieldOfStudy }}
                    <h4 class = " dark:text-white">  Educational Level</h4>
                    {{ $jobRequest->educationLevel }}
                    <h4 class = " dark:text-white">  Visibility</h4>
                    {{ $jobRequest->is_visible }}





                </div>


                {{-- table data --}}



        </div>




</div>



</div>


