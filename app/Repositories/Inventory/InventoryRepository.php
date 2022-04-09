<?php

namespace App\Repositories\Inventory;

use App\Models\InventoryModel;

class InventoryRepository {

    public function getProduct($id) {
        return InventoryModel::find($id);
    }

    public function getProducts($itemsPaginate = false) {
        return InventoryModel::paginate($itemsPaginate);
    }

    public function saveImg($request, $fileName) {
        if ($request->hasFile($fileName)) {
            $ext = $request->file($fileName)->extension();
            return $request->file($fileName)->storeAs($fileName, time().'.'.$ext);
        }
    }
}
