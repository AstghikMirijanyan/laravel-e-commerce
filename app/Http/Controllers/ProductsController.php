<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Interfaces\ProductsServicesInterfaces;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @var ProductsServicesInterfaces
     */
    private $productsService;

    /**
     * Create products Controller constructor.
     * @param ProductsServicesInterfaces $productsService
     */
    public function __construct(ProductsServicesInterfaces $productsService)
    {
        $this->productsService = $productsService;
    }

    /**
     *
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productsService->getProductsData();

        return view('products.index', compact('products'));
    }

    /**
     * @param $productId
     * Display a listing of the resource.
     */
    public function getProductById($productId)
    {
        $product = $this->productsService->getProduct($productId);

        return view('products.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
