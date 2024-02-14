<div>

    {{-- Header Controller --}}

    <div class="flex justify-between items-center py-5 mb-8">
        <div>
            <h2 class="text-4xl font-extrabold dark:text-white">Job Request Listings</h2>
        </div>

        {{-- button for creating scholarship list --}}
        <div>

        </div>
    </div>



    {{-- Table for scholarship Requests --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-2 sm:space-y-0 items-center justify-between pb-4">
            <div>
                

            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div
                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms='search' type="text" id="table-search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        User's Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User's Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User's Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3">
                        job_type
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Education Level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse ($JobRequestList as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $item->user->name }}

                        </td>
                        <td class="px-6 py-4">

                            {{ $item->user->email }}

                        </td>
                        <td class="px-6 py-4">

                            {{ $item->user->phone }}

                        </td>
                        <td class="px-6 py-4">

                            {{ $item->position }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->job_type }}
                        </td>
                        {{--  <td class="px-6 py-4">
                            {{ $item->fieldOfStudy }}
                        </td>  --}}
                        <td class="px-6 py-4">
                             {{ $item->educationLevel }}

                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('job-request.show', ['jobRequest' => $item]) }}"
                                class="font-medium text-green-600 dark:text-green-500 hover:underline">View</a>
                            <button type="button" data-modal-target="{{ $item->id }}"
                                data-modal-toggle="{{ $item->id }}"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>




                            <div id="{{ $item->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="{{ $item->id }}">
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
                                                you sure you want to delete this {{ $item->title }}?</h3>
                                            <button wire:click='delete({{ $item->id }})'
                                                data-modal-hide="{{ $item->id }}" type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="{{ $item->id }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h6>No data found</h6>
                @endforelse





            </tbody>





        </table>
        <div class="p-3">
            {{ $JobRequestList->links() }}
        </div>
    </div>

</div>


