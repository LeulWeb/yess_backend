

        <div>
            <div class=" flex items-center ">

                <a wire:navigate href="{{ route('partners.index') }}">
                    <iconify-icon data-tooltip-target="tooltip-default" icon="ion:arrow-back" style="color: blue;"
                        width="32"></iconify-icon>
                </a>
                <div id="tooltip-default" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Go Back
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

            </div>

            <article class="format lg:format-lg dark:format-invert mt-4  ml-6 mb-7">
                <h2>Create Partners </h2>
            </article>

            {{--  forms  --}}
            <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">
                <div class="grid md:grid-cols-6 gap-5 items-center">
                    {{-- Second column --}}
                    <div class="">
                        <h2>Logo</h2>

                        <div class="flex items-center justify-center  w-32 h-32 rounded-full mb-3">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-32 h-32  border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">

                                    @if ($logo)
                                        <img class="bg-cover w-32 h-32 bg-center rounded-full" src="{{ $logo->temporaryUrl() }}"
                                            alt="Bordered avatar">
                                    @else
                                        <iconify-icon icon="icon-park-outline:add-picture" width="32"></iconify-icon>
                                    @endif


                                </div>
                                <input id="dropzone-file" wire:model.live='logo' type="file" class="hidden" />
                             </label>
                               <div wire:loading wire:target="logo">
                                Uploading...
                               </div>
                        </div>

                        <div>
                            @error('logo')
                                <x-form.error :$message />
                            @enderror
                        </div>
                    </div>

                    {{-- First column --}}
                    <div class="col-span-5 grid grid-cols-2 gap-3">

                        <div>
                            {{-- organization Name --}}
                            <label for="organization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organization
                                Name</label>
                            <input type="text" wire:model.live='organization' id="organization"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="organization......">

                            @error('organization')
                                <x-form.error :$message />
                            @enderror
                             {{-- Company phone --}}
                          <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            Number</label>
                          <input wire:model.live='phone' type="phone" id="phone"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="011234567">

                          @error('phone')
                            <x-form.error :$message />
                          @enderror

                        </div>
                        {{-- second  Email--}}

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Email</label>
                            <input type="email" wire:model.live='email' id="email"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="jhon@email.com">

                            @error('email')
                                <x-form.error :$message />
                            @enderror
                            <div>
                                <label for="area_of_collaboration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area Of Collaboration</label>
                                <input wire:model.live='area_of_collaboration' type="text" id="area_of_collaboration"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Product or Service">
                                @error('area_of_collaboration')
                                    <x-form.error :$message />
                                @enderror

                            </div>


                        </div>


                    </div>

                </div>

                <div class="grid grid-cols-2 gap-4 mb-2">
                    <div class="">
                        <label for="organization_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                class="hidden md:inline">organization </span> Type</label>

                        <select wire:model.live='organization_type' id="organization_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($Organizations as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>


                        @error('organization_type')
                            <x-form.error :$message />
                        @enderror
                    </div>
                    <div>
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                class="hidden md:inline">Status </span></label>

                        <select wire:model.live='status' id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($Status as $item)
                                <option>{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <x-form.error :$message />
                        @enderror

                    </div>

                </div>
                               {{-- file upload --}}

                    <div class="mb-4" >
                           <div>
                            <label for="agreement_file" class="block text-sm font-medium text-gray-700">Agreement File</label>
                            <input id="agreement_file" type="file" wire:model="agreement_file" class="mt-1 block w-full p-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('agreement_file') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                           </div>
                          <div>
                            @error('agreement_file')
                                <x-form.error :$message />
                            @enderror
                           </div>
                    </div>
                        {{-- informations --}}






                    <div  class="w-full flex">
                       <button wire:click ="cancel" type="button"
                         class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                       <button  type="submit"
                        class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                        partner</button>

                    </div>
            </form>

        </div>


