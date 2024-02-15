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
        <a href="/volunteers" class ="flex  mt-6 text-blue-500 text-2xl">
            <iconify-icon icon="healthicons:walk-supported" class="text-3xl"></iconify-icon>
            <h5 class="   tracking-tight text-blue-500 dark:text-white">  Volunteers</h5>
        </a>
    </div>
    {{--  startups  --}}
    <div class="max-w-sm p-6 border text-center  rounded-[12px] border-blue-500  shadow dark:bg-gray-800 dark:border-gray-700  ">

        <p class="mb-3  text-gray-500 dark:text-white-400 text-5xl text-start" >{{ $startupCount }}</p>

        <a href="/startups" class ="flex  mt-6 text-blue-500 text-2xl">
            <iconify-icon icon="streamline:startup"></iconify-icon>
            <h5 class="   tracking-tight text-blue-500 dark:text-white">Startups</h5>
        </a>
    </div>

    {{--  users Table list  --}}
</div>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 mt-5 ">

<div class="flex justify-between mb-10 mt-10">
    <h1 class="text-4xl font-extrabold dark:text-white">Users</h1>
    <a wire:navigate href="{{ route('users.index') }}" type="button"
       class="text-gray-500 hover:text-green-800 focus:ring-4  focus:ring-blue-300 rounded-lg text-lg dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        <div class="flex items-center">
            
            <p class="mr-2">View all Users</p>
            <iconify-icon icon="mdi:table" ></iconify-icon>
        </div>
    </a>
</div>

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
            @forelse ($userss as $user )
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
    <div class="flex flex-col justify-between p-2">
        <div>
            {{ $userss->links() }}
        </div>
    </div>
</div>







</div>
