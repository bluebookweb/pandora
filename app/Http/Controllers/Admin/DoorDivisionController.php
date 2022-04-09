<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoorDivisionRequest;
use App\Repositories\DoorDivisions\DoorDivisionRepository;
use App\Services\DoorDivisions\DoorDivisionService;

class DoorDivisionController extends Controller
{
    private $divisionRepository;
    private $doorDivisionService;

    public function __construct(DoorDivisionRepository $divisionRepository, DoorDivisionService $doorDivisionService) {
        $this->divisionRepository = $divisionRepository;
        $this->doorDivisionService = $doorDivisionService;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = $this->divisionRepository->getProducts(5);
        return view('admin.doordivisions.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.doordivisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DoorDivisionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoorDivisionRequest $request) {
        $this->doorDivisionService->create($request);

        return redirect()->route('door-division.index')
            ->with('msg', 'Product was created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $doorDivision = $this->divisionRepository->getProduct($id);
        if ($doorDivision) {
            return view('admin.doordivisions.edit', compact('doorDivision'));
        } else {
            return redirect()->route('door-division.index')
                ->with('msg', 'Model not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param DoorDivisionRequest $request
     * @param $id
     * @return void
     */
    public function update(DoorDivisionRequest $request, $id) {

        $doorDivision = $this->divisionRepository->getProduct($id);

        if ($doorDivision) {

            $this->doorDivisionService->update($request, $doorDivision);

            return redirect()->route('door-division.index')
                ->with('msg', 'Product was updated successfully!');
        } else {
            return redirect()->route('door-division.index')
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

        $doorDivision = $this->divisionRepository->getProduct($id);

        $this->doorDivisionService->delete($doorDivision);

        return redirect()->route('door-division.index')
            ->with('msg', 'Product was deleted successfully!');
    }
}
