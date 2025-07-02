<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Get All Products
     *
     * 
     * @return \Illuminate\Http\Response
    */
    public function getAllProducts()
    {
        try{
            $products = Product::all(); // fetch all products (latest first)

            return response()->json([
                'status'  => true,
                'message' => 'Product list fetched successfully',
                'data'    => $products
            ], JsonResponse::HTTP_OK);
        }catch (\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
            return false;
        }
    }

    /**
     * Get specific product Detail.
     *
     * 
     * @return \Illuminate\Http\Response
    */
    public function showProduct($id)
    {
        try{
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found',
                ], JsonResponse::HTTP_BAD_REQUEST,);
            }

            return response()->json([
                'status' => true,
                'message' => 'Product fetched successfully',
                'data' => $product,
            ], JsonResponse::HTTP_OK);
        }catch (\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
            return false;
        }
        
    }
  
}
