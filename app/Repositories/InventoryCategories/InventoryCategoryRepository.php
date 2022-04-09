<?php

namespace App\Repositories\InventoryCategories;

use App\Models\InventoryCategoryModel;

class InventoryCategoryRepository {

    public function getProduct($id) {
        return InventoryCategoryModel::find($id);
    }

    public function getProducts($itemsPaginate = false) {
        return InventoryCategoryModel::paginate($itemsPaginate);
    }

    public function saveImg($request, $fileName) {
        if ($request->hasFile($fileName)) {
            $ext = $request->file($fileName)->extension();
            return $request->file($fileName)->storeAs($fileName, time().'.'.$ext);
        }
    }

    public function checkStatus($data, $field) {
        if (isset($data[$field])) {
            return $data[$field] = true;
        } else {
            return $data[$field] = false;
        }
    }

}
