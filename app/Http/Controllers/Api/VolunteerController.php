<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VolunteerResource;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{

    public function index(Request $request)
    {

        $query = $request->query('query');
        $community= $request->query('filter');

        return VolunteerResource::collection(Volunteer::search($query)->filter($community)->latest()->get());
    }



    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        return new VolunteerResource($volunteer);
    }


}
