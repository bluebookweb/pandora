<?php

namespace App\Services\Inventory;

use App\Models\InventoryModel;
use App\Repositories\Inventory\InventoryRepository;
use Illuminate\Support\Facades\Storage;

class InventoryService {

    private $inventory;

    public function __construct(InventoryRepository $inventory)
    {
        $this->inventory = $inventory;
    }

    public function create($request) {
        $data = $request->all();
        if(isset($data['fits_in'])) {
            $data['fits_in'] = implode('::=::', $data['fits_in']);
        }

        try {
            $data['thumb'] = $this->saveImg($request, 'thumb');
            $data['front'] = $this->saveImg($request, 'front');
            $data['top'] = $this->saveImg($request, 'top');
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }

        return InventoryModel::create($data);
    }

    public function update($request, $inventory) {
        $data = $request->all();
        if(isset($data['fits_in'])) {
            $data['fits_in'] = implode('::=::', $data['fits_in']);
        } else {
            $data['fits_in'] = '';
        }
        if ($request->hasFile('thumb')) {
            Storage::delete($inventory->thumb);
            $data['thumb'] = $this->saveImg($request, 'thumb');
        }
        if ($request->hasFile('front')) {
            Storage::delete($inventory->front);
            $data['front'] = $this->saveImg($request, 'front');
        }
        if ($request->hasFile('top')) {
            Storage::delete($inventory->top);
            $data['top'] = $this->saveImg($request, 'top');
        }

        return $inventory->update($data);
    }

    public function delete($id) {
        $inventory = $this->inventory->getProduct($id);
        try {
            Storage::delete($inventory->thumb);
            Storage::delete($inventory->front);
            Storage::delete($inventory->top);
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }
        return $inventory->delete();
    }

    private function saveImg($request, $fileName) {
        if ($request->hasFile($fileName)) {
            $ext = $request->file($fileName)->extension();
            return $request->file($fileName)->storeAs($fileName, time().'.'.$ext);
        }
    }

}
