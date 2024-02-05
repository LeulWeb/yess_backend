<div>
    <div class="flex justify-between items-center">

        <h3 class="text-3xl font-bold dark:text-white">Scholarship Listings</h3>

            <a wire:navigate href="{{ route('scholarship.create') }}" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <div class="flex space-x-2 items-center">
                    <iconify-icon icon="uil:plus" color="white"></iconify-icon>
                    <p> New Scholarships </p>
                </div>

            </a>
        </div>





    {{-- scholarship listing table --}}
    <x-scholarship.scholarship-table :$scholarshipListings />

    @php
        $test= "something"
    @endphp

</div>

