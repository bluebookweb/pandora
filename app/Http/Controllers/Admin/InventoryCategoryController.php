<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryCategoryRequest;
use App\Repositories\InventoryCategories\InventoryCategoryRepository;
use App\Services\InventoryCategory\InventoryCategoryService;

class InventoryCategoryController extends Controller
{
    private $inventoryCategories;
    private $inventoryCategoriesService;

    public function __construct(InventoryCategoryRepository $inventoryCategories, InventoryCategoryService $inventoryCategoriesService) {
        $this->inventoryCategories = $inventoryCategories;
        $this->inventoryCategoriesService = $inventoryCategoriesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->inventoryCategories->getProducts(5, true);
        return view('admin.inventoryCategories.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->inventoryCategories->getProducts();
        return view('admin.inventoryCategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InventoryCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryCategoryRequest $request)
    {
        $this->inventoryCategoriesService->create($request);

        return redirect()->route('inventory-category.index')
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
        $inventoryCategory = $this->inventoryCategories->getProduct($id);
        $categories = $this->inventoryCategories->getProducts();
        if ($inventoryCategory) {
            return view('admin.inventoryCategories.edit', compact([
                'inventoryCategory',
                'categories'
            ]));
        } else {
            return redirect()->route('inventory-category.index')
                ->with('msg', 'Model not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InventoryCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryCategoryRequest $request, $id)
    {
        $inventoryCategory = $this->inventoryCategories->getProduct($id);

        $this->inventoryCategoriesService->update($request, $inventoryCategory);

        return redirect()->route('inventory-category.index')
            ->with('msg', 'Product was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->inventoryCategoriesService->delete($id);

        return redirect()->route('inventory-category.index')
            ->with('msg', 'Product was deleted successfully!');
    }
}
