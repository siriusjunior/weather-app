<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Prefecture::where('furigana', 'LIKE', $query . '%')->get();
        return response()->json($results);
    }
}
