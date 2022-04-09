<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlacePositionRequest;
use App\Repositories\PlacePosition\PlacePositionRepository;
use App\Services\PlacePosition\PlacePositionService;

class PlacePositionController extends Controller
{
    private $placePositions;
    private $placePositionService;

    public function __construct(PlacePositionRepository $placePositions, PlacePositionService $placePositionService) {
        $this->placePositions = $placePositions;
        $this->placePositionService = $placePositionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = $this->placePositions->getProducts();
        return view('admin.positions.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlacePositionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlacePositionRequest $request) {
        $this->placePositionService->create($request);

        return redirect()->route('position.index')
            ->with('msg', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $position = $this->placePositions->getProduct($id);
        if ($position) {
            return view('admin.positions.edit', compact('position'));
        } else {
            return redirect()->route('position.index')
                ->with('msg', 'Model not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PlacePositionRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlacePositionRequest $request, $id) {
        $position = $this->placePositions->getProduct($id);

        if ($position) {

            $this->placePositionService->edit($request, $position);

            return redirect()->route('position.index')
                ->with('msg', 'The product was updated successfully!');
        } else {
            return redirect()->route('position.index')
                ->with('msg', 'Model not found!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->placePositionService->delete($id);

        return redirect()->route('position.index')
            ->with('msg', 'The product was deleted successfully!');
    }
}
