<div class=" dark:text-white">

    {{-- controller header --}}

    <div class="flex items-center justify-between py-5">
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


        <div class="flex space-x-3 items-cetner">
            <button wire:click='toggleEdit()' class="flex items-center space-x-1">

                @if ($editMode)
                    <div class="flex items-center text-green-500">
                        <iconify-icon icon="carbon:view"></iconify-icon>
                        View
                    </div>
                @else
                    <div class="flex items-center text-blue-500">
                        <iconify-icon icon="iconamoon:edit-light" style="color: blue;"></iconify-icon>
                        Edit
                    </div>
                @endif


            </button>
            <button data-modal-target="{{ $scholarship->id }}" data-modal-toggle="{{ $scholarship->id }}" type="button"
                class="flex items-center space-x-1">
                <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
                Remove
            </button>




            <div id="{{ $scholarship->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="{{ $scholarship->id }}">
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
                                you sure you want to delete this {{ $scholarship->title }}?</h3>
                            <button wire:click='delete()' data-modal-hide="{{ $scholarship->id }}" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="{{ $scholarship->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <h2 class="text-4xl font-extrabold dark:text-white m-5">Scholarship Lists</h2>
    </div>

    @if ($editMode)
        <div>
            <div>
                <form wire:submit.prevent='update()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">





                        {{-- First column --}}
                        <div class="col-span-5 grid grid-cols-2 gap-3">

                            {{-- 1st --}}
                            <div>
                                {{-- Title--}}
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title of the Scholarships
                                    </label>
                                <input type="text" wire:model.live='title' id="title"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="title">

                                @error('title')
                                    <x-form.error :$message />
                                @enderror


                                {{-- Country --}}
                                <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Scholarships
                                    Country</label>
                                <input type="text" wire:model.live='country' id="country"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Jhone Doe">

                                @error('country')
                                    <x-form.error :$message />
                                @enderror

                            </div>

                            {{-- second --}}

                            <div>
                                <label for="eligibility_criteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Eligibility Criteria</label>
                                <input type="text" wire:model.live='eligibility_criteria' id="eligibility_criteria"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Eligibility.....">

                                @error('eligibility_criteria')
                                    <x-form.error :$message />
                                @enderror


                                <div class="grid grid-cols-2 gap-3">


                                    <div>
                                        <label for="currency"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                                class="hidden md:inline"></span> Currency</label>

                                        <select wire:model.live='currency' id="currency"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach ($CurrencyEnums as $item)
                                                <option>{{ $item }}</option>
                                            @endforeach
                                        </select>


                                        @error('currency')
                                            <x-form.error :$message />
                                        @enderror


                                    </div>



                                    <div>
                                        <label  for="funding_amount"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Funding <span
                                                class="hidden md:inline">Amount</span></label>
                                        <input wire:model.live='funding_amount' type="number" id="funding_amount" aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="30">

                                        @error('funding_amount')
                                            <x-form.error :$message />
                                        @enderror
                                    </div>
                                </div>

                            </div>


                        </div>






                    <div class="grid grid-cols-4 gap-5">

                        <div>
                            {{-- Links --}}
                            <div class="relative mb-6 flex flex-col">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Link                              </label>
                                <input type="text" id="input-group-1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Link" wire:model.live.debounce.300ms='link'>

                            </div>
                            <div>
                                @error('link')
                                    <x-form.error :$message />
                                @enderror
                            </div>

                        </div>


                        {{-- Program --}}
                        <div>
                            <div class="relative mb-6">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Program
                                </label>

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


                        {{-- application_process --}}
                        <div>
                            <div class="relative mb-6">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Application Proccess
                                </label>

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
                            <div class="relative mb-6">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white my-3">Deadline
                                </label>

                                <input type="text" id="input-group-1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="deadline link" wire:model.live.debounce.300ms='deadline'>

                            </div>
                            <div>
                                @error('deadline')
                                    <x-form.error :$message />
                                @enderror
                            </div>
                        </div>

                    </div>


                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea wire:model.live.debounce.1000ms='description' rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                    @error('description')
                        <x-form.error :$message />
                    @enderror

                    <div class="grid grid-cols-2 gap-5">
                        {{-- cover upload --}}

                        <div class="flex flex-col items-center justify-center w-full">

                            <label for="dropzone-file-one"
                                class="flex flex-col items-center justify-center w-full h-54 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 overflow-hidden">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    @if ($cover)
                                    <img src="{{ $cover->temporaryUrl() }}" class="bg-cover bg-center" alt="">

                                    @elseif ($scholarship->cover)
                                    <img src="{{ asset($scholarship->cover) }}" class="bg-cover bg-center p-8 w-full h-full" alt="">



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
                                <input wire:model.live='cover' id="dropzone-file-one" type="file" class="hidden mb-6 p-8  w-full " />
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
                            <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Funding Source</label>
                            <input wire:model.live='funding_source' type="text" id="product"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Product or Service">
                            @error('funding_source')
                                <x-form.error :$message />
                            @enderror
                            <label for="institution"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution</label>
                            <input wire:model.live='institution' type="text" id="institution"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Institution">

                            <div>
                                @error('institution')
                                    <x-form.error :$message />
                                @enderror
                            </div>
                            {{--  funding_amount --}}
                            <label for="funding_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">funding_amount
                                Number</label>
                            <input wire:model.live='funding_amount' type="number" id="funding_amount"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="funding amount...">

                            @error('funding_amount')
                                <x-form.error :$message />
                            @enderror


                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
                        <button wire:click ="cancel" type="button"
                            class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                        <button  type="submit"
                            class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save Changes</button>

                    </div>




                </form>

            </div>

        </div>
    @else
        {{-- Scholarships info --}}

        <div
            class="w-full  p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">




                {{-- contact info --}}





            <div class="grid grid-cols-2  gap-6">
                <div>
                    <a href="{{ $scholarship->link }}" class = "text-blue-600 hover:text-red-400 text-center ml-2 pl-2"> Click here to see Details </a>

                    <img src="{{ asset($scholarship->cover) }}" alt="" class ="flex flex-col items-center w-full h-full  p-6">

                </div>




                <div class="format flex flex-col justify-center space-y-4 dark:text-white">
                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">About The Scholarships</h2>

                    <h4 class = " dark:text-white"> Scholarship's Title </h4>
                     <li>   {{ $scholarship->title }}</li>
                    <h4 class = " dark:text-white">Country of Risidence wire:</h4>
                    {{ $scholarship->country }}
                    <h4 class = " dark:text-white">About Scholarships</h4>
                    {{ $scholarship->description }}
                    <h4 class = " dark:text-white">  Eligibility Criteria</h4>
                    {{ $scholarship->eligibility_criteria }}
                    <h4 class = " dark:text-white">  Application Process</h4>
                    {{ $scholarship->application_process }}


                    <h4 class = " dark:text-white">Funding Source for The scholarship</h4>
                    {{ $scholarship->funding_source }}

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white ">

                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Currency
                                </td>

                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Funding Amount
                                </td>
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Institution
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                   {{ $scholarship->currency }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $scholarship->funding_amount }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $scholarship->institution }}
                                </td>
                            </tr>


                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Program
                                </td>
                                <td class="px-6 py-4 font-semibold dark:text-whtie">
                                    Deadline
                                </td>

                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">


                                <td class="px-6 py-4">
                                    {{ $scholarship->program }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $scholarship->deadline }}
                                </td>
                            </tr>





                        </tbody>
                    </table>

                </div>


                {{-- table data --}}

            </div>

        </div>
    @endif



</div>



</div>

