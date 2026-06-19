<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\Item;

// all good
class ItemController extends BaseController{
    protected ItemService $svc;

    public function index(Request $request)
{
    $query = Item::query();

    if ($request->has('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    $items = $query->get();

    return response()->json([
        'success' => true,
        'message' => 'Items retrieved successfully',
        'data' => $items
    ]);
}

}