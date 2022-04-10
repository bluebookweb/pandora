<?php

namespace App\Services\Fillings;

use App\Models\FillingModel;
use App\Repositories\Fillings\FillingsRepository;
use Illuminate\Support\Facades\Storage;

class FillingService
{

    private $fillings;

    public function __construct(FillingsRepository $fillings)
    {
        $this->fillings = $fillings;
    }

    public function create($request)
    {
        $data = $request->all();
        $data['available_for'] = implode('::=::', $data['available_for']);

        $data['is_img'] = $this->checkStatus($data, 'is_img');
        $data['is_mirror'] = $this->checkStatus($data, 'is_mirror');

        try {
            $data['background'] = $this->saveImg($request, 'background');
            $data['thumb'] = $this->saveImg($request, 'thumb');
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }

        return FillingModel::create($data);
    }

    public function update($request, $filling)
    {
        $data = $request->all();
        $data['available_for'] = implode('::=::', $data['available_for']);
        $data['is_img'] = $this->checkStatus($data, 'is_img');
        $data['is_mirror'] = $this->checkStatus($data, 'is_mirror');
        if ($request->hasFile('background')) {
            try {
                Storage::delete($filling->background);
                $data['background'] = $this->saveImg($request, 'background');
            } catch (\Exception $e) {
                return back()->withError('File not found!');
            }
        }
        if ($request->hasFile('thumb')) {
            try {
                Storage::delete($filling->thumb);
                $data['thumb'] = $this->saveImg($request, 'thumb');
            } catch (\Exception $e) {
                return back()->withError('File not found!');
            }
        }

        return $filling->update($data);
    }

    public function delete($id)
    {
        $filling = $this->fillings->getProduct($id);
        try {
            Storage::delete($filling->background);
            Storage::delete($filling->thumb);
        } catch (\Exception $e) {
            return back()->withError('File not found!');
        }

        $filling->delete();
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
