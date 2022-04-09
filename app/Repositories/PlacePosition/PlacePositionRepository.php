<?php

namespace App\Repositories\PlacePosition;

use App\Models\PlacePositionModel;

class PlacePositionRepository {

    public function getProduct($id) {
        return PlacePositionModel::find($id);
    }

    public function getProducts($paginateItems = false) {
        return PlacePositionModel::paginate($paginateItems);
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
