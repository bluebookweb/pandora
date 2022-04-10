<?php

namespace App\Repositories\PlacePosition;

use App\Models\PlacePositionModel;

class PlacePositionRepository {

    public function getProducts(int $paginateItems = 5, bool $paginate = true) {
        $placePositions = new PlacePositionModel();

        if ($paginate === true) {
            return $placePositions->paginate($paginateItems);
        } else {
            return $placePositions->get();
        }
    }

    public function getProduct($id) {
        return PlacePositionModel::find($id);
    }

}
