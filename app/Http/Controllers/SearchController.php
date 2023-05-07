<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(
        Request $request
    ): JsonResponse
    {
        $query = $request->input('query');
        $results = Prefecture::where('furigana', 'LIKE', $query . '%')->get();
        return response()->json($results);
    }
}
