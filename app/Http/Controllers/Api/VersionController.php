<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MobileAppVersion;
use App\Http\Controllers\Controller;

class VersionController extends Controller
{
    public function getVersion()
    {
        $current_version = MobileAppVersion::first();

        return response()->json([
            'version' => $current_version->version,
        ]);
    }
}
