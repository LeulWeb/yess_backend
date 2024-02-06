<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ScholarshipRequest;
use App\Http\Controllers\Controller;

class ScholarshipRequestController extends Controller
{


    public function store(Request $request)
    {
    

        $validated = $request->validate([
            // 'user_id' => 'integer',
            'status'=>['required', Rule::in(['new','ongoing','completed'])],
            'title' => 'required|string|max:250|min:7',
            'description' => 'required|string|min:7|max:16777215',
            'deadline' => 'date',
            'challenges' => 'required|string|min:7|max:16777215',
            
            'help_needed' => 'required|string|min:7|max:16777215',
            'document' => 'required|mimes:doc,docx,pdf,txt|max:20480'
        ]);

        $validated['user_id'] = auth('sanctum')->id();

        $pdfName = time().'.'.$request->file('document')->getClientOriginalExtension();

        $request->document->move(public_path('scholarship-request-files'), $pdfName);

        $validated['document'] = 'scholarship-request-files/'.$pdfName;

        ScholarshipRequest::create($validated);

        return response()->json([
            'message' => 'Scholarship request created successfully'
        ]);
    }
}
