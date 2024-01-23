<?php

namespace App\Http\Controllers\Api;

use App\Enums\JobSchedule;
use App\Models\JobRequest;
use Illuminate\Http\Request;
// use App\Http\Requests\JobRequest;
use App\Enums\EducationLevel;
use BenSampo\Enum\Rules\EnumValue;
use App\Http\Controllers\Controller;

class JobRequestController extends Controller
{
   
    public function store(Request $request)
    {
        $job = $request->validate([
            'position'=>'required|string|min:3|max:200',
            'linkedIn'=>'required|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.+/i',
            'resume'=>'required|file|mimes:doc,docx,pdf,txt|max:20480',
            'job_type'=>['required', new EnumValue(JobSchedule::class)],
            'fieldOfStudy'=>'nullable|string',
            'educationLevel'=>['required', new EnumValue(EducationLevel::class)],
            'is_visible'=>'nullable|boolean',
        ]);
        
        $job['user_id'] = auth('sanctum')->id();

        $resumeName = time().'.'.$request->file('resume')->getClientOriginalExtension();

        $request->resume->move(public_path('users-resume'),$resumeName);

        $job['resume'] = 'users-resume/'.$resumeName;

        

        JobRequest::create($job);

        return response()->json([
            'message'=>'Job request submitted successfully',
            'status'=> 'success',
            ]);
    }


    
}
