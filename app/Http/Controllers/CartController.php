<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToCartRequest;
use App\Http\Requests\ChangeProductQuantityInCartRequest;
use App\Http\Requests\RemoveProductFromCartRequest;
use App\Models\Cart;
use App\Services\Interfaces\CartServicesInterfaces;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @var CartServicesInterfaces
     */
    private $cartService;

    /**
     * Create Cars Controller constructor.
     * @param CartServicesInterfaces $cartReviewsService
     */
    public function __construct(CartServicesInterfaces $cartReviewsService)
    {
        $this->cartService = $cartReviewsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $cartData = $this->cartService->getCart($userId);

        return view('cart.index', compact('cartData'));
    }

    /**
     * AddProductToCart Cart
     * @param AddProductToCartRequest $request
     * Show the form for creating a new resource.
     */
    public function addProductToCart(AddProductToCartRequest $request)
    {
        $data = $request->all();
        $this->cartService->addProductToCart($data);

        return back()->with('success', 'Product successfully added to cart .');
    }

    /**
     * Store a newly created resource in storage.
     * @param RemoveProductFromCartRequest $request
     */
    public function removeProductFromCart(RemoveProductFromCartRequest $request)
    {
        $data = $request->all();
        $productId = $data['product_id'];
        $this->cartService->removeProductFromCart($productId);

        return back()->with('success', 'Product successfully deleted .');
    }

    /**
     * Create Cart
     * @param ChangeProductQuantityInCartRequest $request
     */
    public function changeProductQuantityInCart(ChangeProductQuantityInCartRequest $request){
        $data = $request->input();
        $this->cartService->changeProductQuantity($data);

        return back()->with('success', 'Quantity successfully updated .');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
