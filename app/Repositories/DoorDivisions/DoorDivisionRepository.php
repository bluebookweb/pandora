<?php

namespace App\Repositories\DoorDivisions;

use App\Models\DoorDivisionModel;

class DoorDivisionRepository {

    public function getProduct($id) {
        return DoorDivisionModel::find($id);
    }

    public function getProducts(int $paginateItems = 5, bool $paginate = true) {
        $products = new DoorDivisionModel();

        if ($paginate === true) {
            return $products->paginate($paginateItems);
        } else {
            return $products->get();
        }
    }
}
