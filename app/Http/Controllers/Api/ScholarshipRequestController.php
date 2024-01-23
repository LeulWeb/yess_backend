<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipRequest;
use Illuminate\Http\Request;

class ScholarshipRequestController extends Controller
{


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'integer',
            'title' => 'required|string|max:250|min:7',
            'description' => 'required|string|min:7|max:16777215',
            'deadline' => 'date',
            'challenges' => 'required|string|min:7|max:16777215',
            'solution' => 'required|string|min:7|max:16777215',
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
