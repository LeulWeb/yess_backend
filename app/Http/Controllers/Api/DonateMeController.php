<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DonateMeController extends Controller
{
    public function donateMe(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['required', 'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'],
            'reason' => 'required|min:20|max:20000',
            'document' => 'required|file|mimes:png,jpg,doc,docx,pdf',
        ]);


        $documentName = time() . '.' . $validated['document']->getClientOriginalExtension();
        $request->document->move(public_path('donation_documents'), $documentName);
        $documentName = 'donation_documents/' . $documentName;

        $validated['document'] = $documentName;
        $validated['user_id'] = auth('sanctum')->user()->id;

        DonationRequest::create($validated);

        return response()->json([
            'message' => 'Donation request created successfully',
        ]);
    }
}
