<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use App\Models\YessChapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        $chapters = YessChapter::search($query)->latest()->with('training')->get();
        return ChapterResource::collection($chapters);
    }

    public function show(YessChapter $chapter)
    {
        $chapter = $chapter->load('training');
        return new ChapterResource($chapter);
    }
}
