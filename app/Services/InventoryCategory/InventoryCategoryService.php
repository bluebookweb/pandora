<?php

namespace App\Services\InventoryCategory;

use App\Models\InventoryCategoryModel;
use App\Repositories\InventoryCategories\InventoryCategoryRepository;
use Illuminate\Support\Facades\Storage;

class InventoryCategoryService {

    private $inventoryCategories;

    public function __construct(InventoryCategoryRepository $inventoryCategories)
    {
        $this->inventoryCategories = $inventoryCategories;
    }

    public function create($request) {
        $data = $request->all();

        if(isset($data['snap_to_category'])) {
            $data['snap_to_category'] = implode('::=::', $data['snap_to_category']);
        }

        $data['snap_floor'] = $this->checkStatus($data, 'snap_floor');
        $data['top_view'] = $this->checkStatus($data, 'top_view');

        try {
            $data['thumb'] = $this->saveImg($request, 'thumb');
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }

        return InventoryCategoryModel::create($data);
    }

    public function update($request, $inventoryCategory) {
        $data = $request->all();

        if(isset($data['snap_to_category'])) {
            $data['snap_to_category'] = implode('::=::', $data['snap_to_category']);
        } else {
            $data['snap_to_category'] = '';
        }

        $data['snap_floor'] = $this->checkStatus($data, 'snap_floor');
        $data['top_view'] = $this->checkStatus($data, 'top_view');

        if ($request->hasFile('thumb')) {
            try {
                Storage::delete($inventoryCategory->thumb);
                $data['thumb'] = $this->saveImg($request, 'thumb');
            } catch (\Exception $e) {
                return back()->withError('File not found!');
            }
        }

        return $inventoryCategory->update($data);
    }

    public function delete($id) {
        $inventoryCategory = $this->inventoryCategories->getProduct($id);
        try {
            Storage::delete($inventoryCategory->thumb);
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }

        return $inventoryCategory->delete();
    }

    private function saveImg($request, $fileName) {
        if ($request->hasFile($fileName)) {
            $ext = $request->file($fileName)->extension();
            return $request->file($fileName)->storeAs($fileName, time().'.'.$ext);
        }
    }

    private function checkStatus($data, $field) {
        if (isset($data[$field])) {
            return $data[$field] = true;
        } else {
            return $data[$field] = false;
        }
    }

}
