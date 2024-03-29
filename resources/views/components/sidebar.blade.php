<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 transition-transform -translate-x-full bg-blue-500 border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 overflow-y-auto max-h-screen"
    aria-label="Sidebar">
    <div class="flex  flex-col text-white  space-x-3 mx-2 py-10">
        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">YESS</span>
        <span class="self-center  sm:inline text-sm whitespace-nowrap dark:text-white">Youth Education Support
            Service</span>
    </div>


    <div class="  pb-4  bg-blue-500 text-white  dark:bg-gray-800">
        <ul class="space-y-2 font-medium ">
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs('dashboard'),
            ])>
                <a href="/dashboard"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white   dark:hover:bg-gray-700 group">
                    <iconify-icon icon="lucide:layout-dashboard" width="26" height="26"></iconify-icon>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs('users.index'),
            ])>
                <a href="/users"
                    class="flex items-center p-2 mx-3   rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="mingcute:user-3-line" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>

                </a>
            </li>

            {{-- scholarship  --}}
            <li class="mx-3">
                <button type="button"
                    class="flex items-center w-full p-2    text-base  transition duration-75 rounded-lg group dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example-scholarship">
                    <iconify-icon icon="charm:graduate-cap" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Scholarship</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example-scholarship" class="hidden py-2 space-y-2">
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'scholarships.index'),
                    ])>
                        <a href="/scholarships"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white    dark:hover:bg-gray-700">Listings</a>
                    </li>
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'scholarship-request.index'),
                    ])>
                        <a href="/scholarshiprequest"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white    dark:hover:bg-gray-700">Applications</a>
                    </li>

                </ul>
            </li>

            {{-- jobs --}}

            <li class="mx-3">
                <button type="button"
                    class="flex items-center w-full p-2 text-base    transition duration-75 rounded-lg group dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example-job">
                    <iconify-icon icon="tabler:briefcase" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Jobs</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example-job" class="hidden py-2 space-y-2">
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs('jobs.index'),
                    ])>
                        <a href="/jobs"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white   dark:hover:bg-gray-700">Listings</a>
                    </li>
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'job-request.index'),
                    ])>
                        <a
                            href="/jobrequest"class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white   dark:hover:bg-gray-700">Applications</a>
                    </li>

                </ul>
            </li>

            {{-- trainings  --}}
            <li class="mx-3">
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group dark:text-white  dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example-train">
                    <iconify-icon icon="bx:book" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Trainings</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example-train" class="hidden py-2 space-y-2">
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'trainings.index'),
                    ])>
                        <a href="/trainings"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white   dark:hover:bg-gray-700">Trainings
                        </a>
                    </li>
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'trainers.index'),
                    ])>
                        <a href="/trainers"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white    dark:hover:bg-gray-700">Trainers</a>
                    </li>
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'chapters.index'),
                    ])>
                        <a href="/chapters"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white    dark:hover:bg-gray-700"> Chapters</a>
                    </li>

                </ul>
            </li>

            {{-- volunteer  --}}
            <li class="mx-3">
                <button type="button"
                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group dark:text-white dark:hover:bg-gray-700   "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example-voluntter">
                    <iconify-icon icon="material-symbols:volunteer-activism-outline-rounded" width="26"
                        height="26"></iconify-icon>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Volunteer</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example-voluntter" class="hidden py-2 space-y-2   ">
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'volunteers.index'),
                    ])>
                        <a href="/volunteers"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white dark:hover:bg-gray-700    ">Listing</a>
                    </li>
                    <li @class([
                        'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                            'volunteer-application.index'),
                    ])>
                        <a href="/volunteerApplication"
                            class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group dark:text-white dark:hover:bg-gray-700    ">Applications</a>
                    </li>

                </ul>
            </li>

            {{-- Donations --}}


            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                    'donation-request.index'),
            ])>
                <a href="/donationrequest"
                    class="flex items-center p-2 mx-3   rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="mingcute:user-3-line" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Donation Request</span>

                </a>
            </li>

            {{-- Events --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                    'events.index'),
            ])>
                <a href="/events"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                    <iconify-icon icon="material-symbols:event-outline" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Events</span>

                </a>
            </li>
            {{-- News --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs('blogs.index'),
            ])>
                <a href="/blogs"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="icons8:news" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Blogs</span>

                </a>
            </li>
            {{-- News --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs('news.index'),
            ])>
                <a href="/news"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="icons8:news" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">News</span>

                </a>
            </li>
            

            {{-- Sponser --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                    'sponsers.index'),
            ])>
                <a href="/sponsers"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="iconoir:hand-cash" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sponser</span>

                </a>
            </li>

            {{-- partner --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                    'partners.index'),
            ])>
                <a href="/partners"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="fa-regular:handshake" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Partners</span>

                </a>
            </li>
            {{--  subscribers  --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                    'subscribers.index'),
            ])>
                <a href="/subscribers"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white   dark:hover:bg-gray-700 group">
                    <iconify-icon icon="mdi:envelope-outline" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Subscribers</span>

                </a>
            </li>
            {{-- FAQ --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs('faqs.index'),
            ])>
                <a href="/faqs"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="ri:question-line" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">FAQ</span>

                </a>
            </li>
            {{-- startups --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                    'startups.index'),
            ])>
                <a href="/startups"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="streamline:startup" class="w-26 h-26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Startups</span>

                </a>
            </li>
            {{-- Youths --}}
            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs('youth.index'),
            ])>
                <a href="/youths"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="cil:user" width="26" height="26"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Youths</span>

                </a>
            </li>


            <li @class([
                'bg-white dark:bg-black text-blue-500' => request()->routeIs(
                    'mobile_version'),
            ])>
                <a href="/mobile_version"
                    class="flex items-center p-2 mx-3  rounded-lg dark:text-white    dark:hover:bg-gray-700 group">
                    <iconify-icon icon="la:mobile" width="32" height="32"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Mobile App Version</span>

                </a>
            </li>

            {{-- end --}}



        </ul>
    </div>
</aside>
