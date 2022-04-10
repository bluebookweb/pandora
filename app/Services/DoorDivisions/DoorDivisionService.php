<?php

namespace App\Services\DoorDivisions;

use App\Models\DoorDivisionModel;
use App\Repositories\DoorDivisions\DoorDivisionRepository;
use Illuminate\Support\Facades\Storage;

class DoorDivisionService {

    private $divisionRepository;

    public function __construct(DoorDivisionRepository $divisionRepository) {
        $this->divisionRepository = $divisionRepository;
    }

    public function create($request) {
        $data = $request->all();
        try {
            $data['image'] = $this->saveImg($request, 'image');
        } catch (\Exception $e) {
            return redirect()->route('door-division.index')
                ->with('msg', 'File was not founded!');
        }
        return DoorDivisionModel::create($data);

    }

    public function update($request, $doorDivision) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            Storage::delete($doorDivision->image);
            try {
                $data['image'] = $this->saveImg($request, 'image');
            } catch (\Exception $e) {
                return redirect()->route('door-division.index')
                    ->with('msg', 'File was not founded!');
            }
        }
        return $doorDivision->update($data);
    }

    public function delete($doorDivision) {
        Storage::delete($doorDivision->image);
        return $doorDivision->delete();
    }

    private function saveImg($request, $fileName) {
        if ($request->hasFile($fileName)) {
            $ext = $request->file($fileName)->extension();
            return $request->file($fileName)->storeAs($fileName, time().'.'.$ext);
        }
    }
}
