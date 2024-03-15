<div>
    <div class=" flex items-center ">


        <a wire:navigate href="{{ route('scholarships.index') }}">
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
        <h2>Create scholarships </h2>
    </article>

    <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">
        <div class="grid grid-cols-2 gap-5 ">


            {{-- Second column --}}




            <div>
                @error('institution')
                    <x-form.error :$message />
                @enderror
            </div>


            {{-- First column --}}
            <div class="col-span-5 grid grid-cols-2 gap-3">

                {{-- 1st --}}
                <div>
                    {{-- Comapnyt Name --}}
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ttitle
                    </label>
                    <input type="text" wire:model.live='title' id="title"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title....">

                    @error('title')
                        <x-form.error :$message />
                    @enderror


                    {{-- country name --}}
                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                        Country</label>
                    <input type="text" wire:model.live='country' id="country"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Country...">

                    @error('country')
                        <x-form.error :$message />
                    @enderror

                </div>

                {{-- second --}}

                <div>
                    <label for="Eligibility_criteria"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Eligibility Criteria
                    </label>
                    <input type="text" wire:model.live='Eligibility_criteria' id="Eligibility_criteria"
                        aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Egibility...">

                    @error('Eligibility_criteria')
                        <x-form.error :$message />
                    @enderror


                    <div class="grid grid-cols-2 gap-3">


                        <div>
                            <label for="currency"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="hidden md:inline">Currency</span> </label>

                            <select wire:model.live='currency' id="currency"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($CurrencyEnum as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
                            </select>


                            @error('currency')
                                <x-form.error :$message />
                            @enderror


                        </div>




                        <div>
                            <label for="program_duration"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program <span
                                    class="hidden md:inline">Duration</span></label>
                            <input wire:model.live='program_duration' type="number" id="program_duration"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="duration in month...">

                            @error('program_duration')
                                <x-form.error :$message />
                            @enderror
                        </div>


                    </div>

                </div>


            </div>

        </div>




        <div class="grid grid-cols-4 gap-5">

            <div>
                {{-- link --}}
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Website
                    Link</label>
                <div class="relative mb-6 flex flex-col">

                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="link" wire:model.live.debounce.300ms='link'>

                </div>
                <div>
                    @error('link')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>


            {{-- program --}}
            <div>
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Program</label>
                <div class="relative mb-6">

                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="program" wire:model.live.debounce.300ms='program'>

                </div>
                <div>
                    @error('program')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>


            {{-- aplication process --}}
            <div>
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Application
                    Proccess</label>
                <div class="relative mb-6">

                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="application_process" wire:model.live.debounce.300ms='application_process'>
                </div>
                <div>

                    @error('application_process')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>

            {{-- deadline --}}
            <div>
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Deadline</label>
                <div class="relative mb-6">

                    <input type="date" id="input-group-1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="deadline " wire:model.live.debounce.300ms='deadline'>

                </div>
                <div>
                    @error('deadline')
                        <x-form.error :$message />
                    @enderror
                </div>
            </div>

        </div>



        <div class="grid grid-cols-2 gap-5">
            {{-- image upload --}}

            <div class="flex flex-col items-center justify-center w-full">

                <label for="dropzone-file-one"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        @if ($cover)
                            <img src="{{ $cover->temporaryUrl() }}" class="bg-cover bg-center" alt="">
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
                    <input wire:model.live='cover' id="dropzone-file-one" type="file" class="hidden mb-6" />
                    <div wire:loading wire:target="cover">Uploading...</div>
                </label>


                <div>
                    @error('cover')
                        <x-form.error :$message />
                    @enderror
                </div>

            </div>



            {{-- informations --}}

            <div>
                <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Funding
                    Sources</label>
                <input wire:model.live='funding_source' type="text" id="product"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Funding Source">
                @error('funding_source')
                    <x-form.error :$message />
                @enderror


                <label for="institution"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution</label>
                <input wire:model.live='institution' type="text" id="institution"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Institutions">

                <div>
                    @error('institution')
                        <x-form.error :$message />
                    @enderror
                </div>
                {{--  funding_amount --}}
                <label for="funding_amount"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">funding_amount
                    Number</label>
                <input wire:model.live='funding_amount' type="number" id="funding_amount"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="1000000">

                @error('funding_amount')
                    <x-form.error :$message />
                @enderror





            </div>
        </div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea wire:model.live.debounce.1000ms='description' rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here...">
        </textarea>
        @error('description')
            <x-form.error :$message />
        @enderror

        <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button wire:click ="cancel" type="button"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                scholarship</button>

        </div>




    </form>

</div>
