<?php

namespace App\Http\Controllers;

use App\Models\ProductReviews;
use App\Http\Requests\CreateProductReviewsRequest;
use App\Services\Interfaces\ProductReviewsServicesInterfaces;
use Illuminate\Http\Request;


class ProductReviewsController extends Controller
{
    /**
     * @var ProductReviewsServicesInterfaces
     */
    private $productReviewsService;

    /**
     * Create Cars Controller constructor.
     * @param ProductReviewsServicesInterfaces $productReviewsService
     */
    public function __construct(ProductReviewsServicesInterfaces $productReviewsService)
    {
        $this->productReviewsService = $productReviewsService;
    }

    /**
     * Create ProductReviews
     * @param CreateProductReviewsRequest $request
     */
    public function insertProductReview(CreateProductReviewsRequest $request)
    {
        $data = $request->all();
        $this->productReviewsService->createReviewForProduct($data, $data['product_id']);

        return back()->with('success', 'Review created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductReviews $productReviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductReviews $productReviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductReviews $productReviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductReviews $productReviews)
    {
        //
    }
}
