<?php

namespace App\Services\PlacePosition;

use App\Models\PlacePositionModel;
use App\Repositories\PlacePosition\PlacePositionRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class PlacePositionService {

    private $placePositions;

    public function __construct(PlacePositionRepository $placePositions) {
        $this->placePositions = $placePositions;
    }

    public function create($request) {
        Artisan::call('storage:link', []);
        $data = $request->all();

        $data['has_gable'] = $this->placePositions->checkStatus($data, 'has_gable');
        $data['has_impact'] = $this->placePositions->checkStatus($data, 'has_impact');
        try {
            $data['image'] = $this->placePositions->saveImg($request, 'image');
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }

        return PlacePositionModel::create($data);
    }

    public function edit($request, $position) {
        $data = $request->all();
        $data['has_gable'] = $this->placePositions->checkStatus($data, 'has_gable');
        $data['has_impact'] = $this->placePositions->checkStatus($data, 'has_impact');
        if ($request->hasFile('image')) {
            Storage::delete($position->image);
            try {
                $data['image'] = $this->placePositions->saveImg($request, 'image');
            } catch (\Exception $e) {
                return back()->withError('File not found!');
            }
        }
        return $position->update($data);
    }

    public function delete($id) {

        $position = $this->placePositions->getProduct($id);

        try {
            Storage::delete($position->image);
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }

        return $position->delete();
    }
}
