<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $item = Item::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);

        return response()->json([
            'message' => 'Item berhasil ditambahkan',
            'data' => $item
        ], 201);
    }

    public function show(Item $item)
    {
        return response()->json($item);
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return response()->json([
            'message' => 'Item berhasil diupdate',
            'data' => $item
        ]);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json([
            'message' => 'Item berhasil dihapus'
        ]);
    }
}