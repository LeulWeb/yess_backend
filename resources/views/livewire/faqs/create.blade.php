<div>
    <form wire:submit.prevent='create()' class="w-10/12 mx-auto" method="post" enctype="multipart/form-data">


                {{--  question --}}

                    <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question
                        </label>
                    <input type="text" wire:model.live='question' id="question"
                        aria-describedby="helper-text-explanation"
                        class=" w-full bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="add your your questions here...">
                    @error('question')
                        <x-form.error :$message />

                    @enderror



        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer</label>
        <textarea wire:model.live.debounce.1000ms='answer' rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 mb-6 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write the  answer here..."></textarea>
        @error('answer')
            <x-form.error :$message />
        @enderror


        <div class="grid md:grid-cols-2 gap-y-5 gap-x-3 mt-5">
            <button type="button"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
            <button  type="submit"
                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                FAQ</button>
        </div>
    </form>

</div>


