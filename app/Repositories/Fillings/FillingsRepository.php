<?php

namespace App\Repositories\Fillings;

use App\Models\FillingModel;

class FillingsRepository {

    public function getProduct($id) {
        return FillingModel::find($id);
    }

    public function getProducts(int $paginateItems = 5, bool $paginate = true) {
        $products = new FillingModel();

        if ($paginate === true) {
            return $products->paginate($paginateItems);
        } else {
            return $products->get();
        }
    }

}
