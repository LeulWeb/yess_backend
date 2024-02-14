<div >
    <h1 class="text-4xl font-extrabold dark:text-white mt-7 mb-5">Stastics</h1>
<div class="grid grid-cols-5 gap-4">
    {{--  //users  --}}

    <div class="max-w-sm p-6 border text-center  rounded-[12px] border-blue-500  shadow dark:bg-gray-800 dark:border-gray-700  ">

        <p class="mb-3  text-gray-500 dark:text-white-400 text-5xl text-start">{{ $userCount }}</p>

        <a href="/users" class ="flex  mt-6 text-blue-500 text-2xl">
            <iconify-icon icon="simple-line-icons:user"></iconify-icon>
            <h5 class="   tracking-tight text-blue-500 dark:text-white">  Users</h5>
        </a>
    </div>
   {{--  //subscriber  --}}
   <div class="max-w-sm p-6 border text-center  rounded-[12px] border-blue-500  shadow dark:bg-gray-800 dark:border-gray-700  ">

    <p class="mb-3  text-gray-500 dark:text-white-400 text-5xl text-start">{{ $subscriberCount }}</p>

    <a href="/susbscribers" class ="flex  mt-6 text-blue-500 text-2xl">
        <iconify-icon icon="fluent-mdl2:subscribe"></iconify-icon>
        <h5 class="   tracking-tight text-blue-500 dark:text-white"> Subscribers</h5>
    </a>
</div>
      {{--  //trainers  --}}
      <div class="max-w-sm p-6 border text-center  rounded-[20px] border-blue-500  shadow dark:bg-gray-800 dark:border-gray-700  ">

        <p class="mb-3  text-gray-500 dark:text-white-400 text-5xl text-start">{{ $trainerCount }}</p>

        <a href="/trainers" class ="flex  mt-6 text-blue-500 text-2xl text-start">
            <iconify-icon icon="healthicons:i-training-class" class="text-3xl"></iconify-icon>
            <h5 class="   tracking-tight text-blue-500 dark:text-white"> Trainers</h5>
        </a>
    </div>
      {{--  //volunteers  --}}
      <div class="max-w-sm p-6 border border-blue-500 rounded-[20px] shadow dark:bg-gray-800 dark:border-gray-700 text-center  ">

        <p class="mb-3  text-gray-500 dark:text-white-400 text-5xl text-start">{{ $volunteerCount }}</p>
        <a href="/volunteers" class ="flex  mt-6 text-blue-500">
            <svg class="  w-8 h-8 text-blue-500 dark:text-white " aria-hidden="true" icon="mingcute:user-3-line" fill="currentColor" viewBox="0 0 18 20">
                <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
            </svg>
            <h5 class=" text-2xl  tracking-tight text-blue-500 dark:text-white"> Volunteer's</h5>
        </a>
    </div>
    {{--  startups  --}}
    <div class="max-w-sm p-6 border text-center  rounded-[12px] border-blue-500  shadow dark:bg-gray-800 dark:border-gray-700  ">

        <p class="mb-3  text-gray-500 dark:text-white-400 text-5xl text-start" >{{ $startupCount }}</p>

        <a href="/startups" class ="flex  mt-6 text-blue-500">
            <svg class="  w-8 h-8 text-blue-500 dark:text-white " aria-hidden="true" icon="mingcute:user-3-line" fill="currentColor" viewBox="0 0 18 20">
                <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
            </svg>
            <h5 class="ml-2 text-2xl  tracking-tight text-blue-500 dark:text-white">Startups </h5>
        </a>
    </div>

    {{--  users Table list  --}}
</div>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

<h1 class="text-4xl font-extrabold dark:text-white mt-7 mb-5"> Users</h1>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Users name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Country
                </th>
                <th scope="col" class="px-6 py-3">
                    City
                </th>



            </tr>
        </thead>
        <tbody class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            @forelse ($users as $user )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <td class="px-6 py-4">
                    <iconify-icon icon="et:profile-male" ></iconify-icon>
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4  ">
                    <iconify-icon icon="material-symbols:mark-email-read-outline" ></iconify-icon>
                    {{ $user->email }}

                </td>
                <td class="px-6 py-4">
                    <a href ="{{ $user->phone }}">
                        <iconify-icon icon="ic:sharp-phone" class =""></iconify-icon>
                        {{ $user->phone }}
                    </a>

                </td>
                <td class="px-6 py-4 ">
                    <iconify-icon icon="circle-flags:united-nations"></iconify-icon>
                    {{ $user->country }}
                </td>
                <td class="px-6 py-4 ">
                    <iconify-icon icon="arcticons:zood-location" "></iconify-icon>
                    {{ $user->city }}
                </td>

            </tr>

            @empty
            <h1> user are data are empty!</h1>

            @endforelse



        </tbody>
    </table>
</div>







</div>
