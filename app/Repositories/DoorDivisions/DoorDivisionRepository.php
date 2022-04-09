<?php

namespace App\Repositories\DoorDivisions;

use App\Models\DoorDivisionModel;

class DoorDivisionRepository {

    public function getProduct($id) {
        return DoorDivisionModel::find($id);
    }

    public function getProducts($paginateItems = false) {
        return DoorDivisionModel::paginate($paginateItems);
    }

    public function saveImg($request, $fileName) {
        if ($request->hasFile($fileName)) {
            $ext = $request->file($fileName)->extension();
            return $request->file($fileName)->storeAs($fileName, time().'.'.$ext);
        }
    }
}
