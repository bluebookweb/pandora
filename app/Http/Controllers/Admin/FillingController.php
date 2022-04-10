<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FillingRequest;
use App\Repositories\Fillings\FillingsRepository;
use App\Services\Fillings\FillingService;

class FillingController extends Controller
{
    private $fillings;
    private $fillingService;

    public function __construct(FillingsRepository $fillings, FillingService $fillingService) {
        $this->fillings = $fillings;
        $this->fillingService = $fillingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->fillings->getProducts(5, true);
        return view('admin.fillings.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fillings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FillingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FillingRequest $request)
    {
        $this->fillingService->create($request);

        return redirect()->route('fillings.index')
            ->with('msg', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filling = $this->fillings->getProduct($id);
        if ($filling) {
            return view('admin.fillings.edit', compact('filling'));
        } else {
            return redirect()->route('fillings.index')
                ->with('msg', 'Model not found!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param FillingRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(FillingRequest $request, $id)
    {
        $filling = $this->fillings->getProduct($id);

        if ($filling) {

            $this->fillingService->update($request, $filling);

            return redirect()->route('fillings.index')
                ->with('msg', 'Product was updated successfully!');
        } else {
            return redirect()
                ->route('fillings.index')
                ->with('msg', 'Model not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->fillingService->delete($id);

        return redirect()->route('fillings.index')
            ->with('msg', 'Product was deleted successfully!');
    }
}
