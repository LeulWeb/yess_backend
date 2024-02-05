<div>
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
    <article class="format lg:format-lg dark:format-invert mt-4 mb-5">
        <h2>Create Users </h2>
    </article>

    <form wire:submit.prevent='create()' class="w-10/12 mt-3 mb-3 mx-auto" method="post" enctype="multipart/form-data">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    {{--  User Name  --}}
                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <div class="flex">
                           <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                        </span>
                        <input type="text" id="website-admin" wire:model ="username" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">

                    </div>
                    @error('username') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror

                </div>

                <div>
                    {{--  Name  --}}
                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <div class="flex">

                        <input type="text" id="website-admin" wire:model ="name" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">

                    </div>
                    @error('name') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror

                </div>

                <!-- Other fields... -->

             <div class="">          {{--  Email  --}}
                <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>


                   <input type="email" id="email-address-icon"  wire:model ="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">
                   @error('email') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
             </div>
            {{--  Phone  --}}
            <div class="">
             <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Phone</label>
             <input type="phone" id="phone" wire:model ="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+251934432341">
            </div>

            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Bio's</label>
                   <textarea id="message" rows="4" wire:model ="bio" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>

                    @error('bio') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Story</label>
                   <textarea id="message" rows="4" wire:model ="story" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>

                    @error('story') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>



             </div>
             <div class ="grid grid-cols-2 gap-4 mt-2 mb-2">
                <div class="flex flex-col items-center justify-center w-full">

                    <label for="dropzone-file-one"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if ($profile_picture)
                                <img src="{{ $profile_picture->temporaryUrl() }}" class="bg-cover bg-center" alt="">
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to
                                        upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            @endif
                        </div>
                        <input wire:model.live='profile_picture' id="dropzone-file-one" type="file" class="hidden mb-6" />
                    </label>


                    <div>
                        @error('profile_picture')
                            <x-form.error :$message />
                        @enderror
                    </div>

                </div>
                <div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Location</label>
                        <input  wire:model ="locations" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" placeholder ="Enter your locations" type="text">
                     <div>  @error('locations') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror </div>
                    </div>

                        <div>
                            {{--  Interest  --}}
                            <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interest</label>
                            <div class="flex">

                                <input wire:model ="interest" type="text"  id="website-admin" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Interests....">

                            </div>
                            <div>  @error('interest') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror </div>

                        </div>
                        <!-- Other fields... -->

                        <div>
                            {{--  skill  --}}
                            <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skils</label>
                            <div class="flex">

                                <input wire:model ="skill" type="text" id="website-admin"   class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Skills That You have....">
                                <div> @error('skill') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror</div>
                            </div>

                        </div>
                </div>



             </div>




            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status </label>
                         <select id="status"  wire:model ="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                             <option>Active</option>
                             <option>Inactive</option>
                             </select>
                             <div>
                                @error('status') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                            </div>

                </div>
                <div>
                    <label for="role"   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role </label>
                         <select  wire:model ="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                              <option>User</option>
                             <option>Admin</option>
                             <option>Member</option>
                             </select>
                  <div>  @error('role') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror</div>
                </div>

            </div>

            <div class="flex justify-between gap-3  mt-5">
                <button type="button" wire:click="cancel"
                    class="text-white w-1/2 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                <button type="submit" wire:click ="create()"
                    class="text-white w-1/2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                    partner</button>
            </div>


    </form>




    </div>








