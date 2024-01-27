<div>
   

        <form wire:submit.prevent="create()" class="space-y-6 m-5 p-4  mb-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" type="text" wire:model="username" placeholder="Enter userName"  class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                    @error('username') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" type="text" wire:model="name"  placeholder="enter Name.."  class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Other fields... -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" wire:model="email" placeholder="taye@gmail.com" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input id="phone" type="text" wire:model="phone" placeholder="+251943882222" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('phone') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                    <textarea id="bio" rows="4" wire:model="bio" placeholder="put here your Bios.." class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    @error('bio') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="story" class="block text-sm font-medium text-gray-700">Story</label>
                    <textarea id="story" rows="4" wire:model="story" placeholder=" Add about your story..." class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    @error('story') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Other fields... -->

                <div>
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <input id="profile_picture" type="file" wire:model="profile_picture" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('profile_picture') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="locations" class="block text-sm font-medium text-gray-700">Locations</label>
                    <input id="locations" type="text" wire:model="locations"  placeholder="Addis Ababa"  class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('locations') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="interest" class="block text-sm font-medium text-gray-700">Interest</label>
                    <input id="interest" type="text" wire:model="interest" placeholder="your INTEREST...." class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('interest') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
               {{--  LOCations  --}}


                <!-- Other fields... -->

                <div>
                    <label for="skill" class="block text-sm font-medium text-gray-700">Skill</label>
                    <input id="skill" type="text" wire:model="skill" placeholder="skills that you have" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('skill') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" wire:model="status" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" wire:model="role" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>
                    @error('role') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

            </div>

            <div class="flex justify-between gap-4 ">
                <button type="button" wire:click="cancel"
                    class="text-white w-1/2 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                <button type="submit"
                    class="text-white w-1/2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                    partner</button>


        </form>






    </div>



