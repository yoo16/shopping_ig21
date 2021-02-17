<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function get()
    {
        $items = Item::limit(10)->get();
        return response()->json($items);
    }

    public function fetch(Request $request)
    {
        $item = Item::find($request->id);
        return response()->json($item);
    }
}
