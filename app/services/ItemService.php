<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class ItemService {
    public function all(): Collection {
        return Item::with('category')->get(); 
    }

    public function find(int $id): Item{
        return Item::with('category')->findOrFail($id); 
    }

    public function create(array $data): Item {
         Log::info('Item created', [
    'name' => $data['name']
]);
        return Item::create($data); 
       
    }

    public function update(int $id, array $data): Item 
    {
        $item = Item::findOrFail($id); 
        $item->update($data); 
        Log::info('Item updated', [
    'id' => $id
]);
        return $item; 
    }

    public function delete(int $id): void 
    {
        Item::destroy($id); 
        Log::info('Item deleted', [
    'id' => $id 
]);
    }
}