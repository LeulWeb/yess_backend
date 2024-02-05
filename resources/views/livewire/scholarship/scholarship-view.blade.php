<div>
    <div class=" flex items-center ">
        <a wire:navigate href="{{ route('scholarship-listing') }}">
            <iconify-icon data-tooltip-target="tooltip-default" icon="ion:arrow-back" style="color: blue;"
                width="32"></iconify-icon>
        </a>
        <div id="tooltip-default" role="tooltip"
            class="relative z-10  invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Go Back
            <div class="tooltip-arrow" data-popper-arrow></div>

        </div>
        <div class=" ml-50 inline-block ">
            <button wire:click="redirectToEditPage({{ $scholarship->id }})" class="block">
                <div class="flex items-center text-blue-500">
                    <iconify-icon icon="iconamoon:edit-light" style="color: blue;"></iconify-icon>
                    Edit
                </div>
            </button>
        <button data-modal-target="" data-modal-toggle="" type="button"
            class="flex items-center space-x-1 ">
            <iconify-icon icon="gg:trash" style="color: red;"></iconify-icon>
            Remove
        </button>
        </div>
    </div>


    <a
   <div class="text-center ml-10">
    <article class=" format lg:format-lg ml-48 ">
        <h1>{{$scholarship->title}}</h1>
        <p class="lead">{{$scholarship->description}}</p>
        <p>Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way, you can think things through before committing to an actual design project.</p>

        <img src="{{$scholarship->cover}}" alt="" class=" justify-items-center ml-48">

        <h3>Application Process</h3>
        <p>{{$scholarship->application_process}}</p>
        <h3>Eligibility Criteria</h3>
        <p>
            {{$scholarship->eligibility_criteria}}
        </p>
        <h3>Information</h3>
        <ul>
            <li><strong>Country</strong>    {{$scholarship->country}}</li>
            <li><strong>Program</strong>    {{$scholarship->program}}</li>
            <li><strong>Institution/University</strong> {{$scholarship->institiution}}</li>
            <li><strong>Funding Amount</strong>     {{$scholarship->funding_amount}} <em>{{$scholarship->currency}}</em> </li>
            <li><strong>Application Deadline</strong>   {{$scholarship->deadline}}</li>
            <li><strong>Program Duration</strong>   {{$scholarship->program_duration}}</li>



        </ul>

    </article>
   </div>

</div>

