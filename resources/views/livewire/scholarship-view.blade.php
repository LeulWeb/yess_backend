<div>
    <article class="format lg:format-lg">
        <h1>{{$scholarship->title}}</h1>
        <p class="lead">{{$scholarship->description}}</p>
        <p>Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way, you can think things through before committing to an actual design project.</p>

        <img src="{{$scholarship->cover}}" alt="">

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
