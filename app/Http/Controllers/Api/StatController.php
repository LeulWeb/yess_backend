<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Scholarship;
use App\Models\Training;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        return response()->json([
            'scholarship' => Scholarship::count(),
            'jobs' => Job::count(),
            "training" => Training::count(),
        ]);
    }
}
