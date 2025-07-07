<?php

namespace App\Http\Controllers;

use App\Models\Deceased;
use Illuminate\Http\Request;

class DeceasedController extends Controller
{
    // 🔍 Search API
    public function search(Request $request)
    {
        $keyword = $request->query('keyword');

        $results = Deceased::where('full_name', 'like', "%$keyword%")
                    ->orWhere('id_number', 'like', "%$keyword%")
                    ->orWhere('lot_number', 'like', "%$keyword%")
                    ->get();

        return response()->json($results);
    }

    // 📍 Get Plot API by Lot Number
    public function getPlot($lot_number)
    {
        $plot = Deceased::where('lot_number', $lot_number)->first();

        if (!$plot) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json($plot);
    }
}
