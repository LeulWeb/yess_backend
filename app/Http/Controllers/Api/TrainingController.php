<?php

namespace App\Http\Controllers\Api;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingResource;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        $trainings = Training::search($query)->latest()->with('trainer')->get();
        return TrainingResource::collection($trainings);
    }

    public function show(Training $training)
    {
        $training = $training->load('trainer');
        return new TrainingResource($training);
    }
}
