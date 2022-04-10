<?php

namespace App\Repositories\InventoryCategories;

use App\Models\InventoryCategoryModel;

class InventoryCategoryRepository {

    public function getProduct($id) {
        return InventoryCategoryModel::find($id);
    }

    public function getProducts(int $paginateItems = 5, bool $paginate = true) {
        $products = new InventoryCategoryModel();

        if ($paginate === true) {
            return $products->paginate($paginateItems);
        } else {
            return $products->get();
        }
    }
}
