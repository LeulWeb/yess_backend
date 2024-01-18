<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VolunteerResource;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{

    public function index()
    {
        return VolunteerResource::collection(Volunteer::latest()->get());
    }



    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        return new VolunteerResource($volunteer);
    }


}
