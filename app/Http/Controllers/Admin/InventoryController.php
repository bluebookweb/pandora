<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryRequest;
use App\Repositories\Inventory\InventoryRepository;
use App\Repositories\InventoryCategories\InventoryCategoryRepository;
use App\Services\Inventory\InventoryService;

class InventoryController extends Controller
{
    private $inventory;
    private $inventoryService;
    private $inventoryCategories;

    public function __construct(InventoryRepository $inventory, InventoryService $inventoryService, InventoryCategoryRepository $inventoryCategories) {
        $this->inventory = $inventory;
        $this->inventoryService = $inventoryService;
        $this->inventoryCategories = $inventoryCategories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->inventory->getProducts(5, true);
        return view('admin.inventory.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->inventory->getProducts();
        $categories = $this->inventoryCategories->getProducts();
        return view('admin.inventory.create', compact(['categories', 'products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InventoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        $this->inventoryService->create($request);

        return redirect()->route('inventory.index')
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
        $inventory = $this->inventory->getProduct($id);
        $products = $this->inventory->getProducts();
        $categories = $this->inventoryCategories->getProducts();
        if ($inventory) {
            return view('admin.inventory.edit', compact([
                'inventory',
                'categories',
                'products'
            ]));
        } else {
            return redirect()
                ->route('inventory.index')
                ->with('msg', 'Model not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InventoryRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryRequest $request, $id)
    {
        $inventory = $this->inventory->getProduct($id);

        $this->inventoryService->update($request, $inventory);

        return redirect()->route('inventory.index')
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
        $this->inventoryService->delete($id);

        return redirect()->route('inventory.index')
            ->with('msg', 'Product was deleted successfully!');
    }
}
