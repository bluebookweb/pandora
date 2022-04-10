<?php

namespace App\Repositories\Inventory;

use App\Models\InventoryModel;

class InventoryRepository {

    public function getProduct($id) {
        return InventoryModel::find($id);
    }

    public function getProducts(int $paginateItems = 5, bool $paginate = true) {
        $products = new InventoryModel();

        if ($paginate === true) {
            return $products->paginate($paginateItems);
        } else {
            return $products->get();
        }
    }
}
