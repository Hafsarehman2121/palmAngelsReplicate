<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'productName'        => 'required|string|max:255',
                'productCode'        => 'required|string|max:255',
                'productDescription' => 'nullable|string',
                'productPrice'       => 'required|integer',
                'quantity'           => 'required|integer',
                'productImage'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            if ($validator->fails()) {
               return redirect()->back()->withErrors($validator)->withInput();
            }

            if($request->hasFile('productImage')){
                    $file = $request->file('productImage');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/img'),$filename);
            }
            // Save to DB

             DB::BeginTransaction();
            $data = [
                'productName'        => $request->input('productName'),
                'productCode'        => $request->input('productCode'),
                'productDescription' => $request->input('productDescription'),
                'productPrice'       => $request->input('productPrice'),
                'quantity'    => $request->input('quantity'),
                'productImage' => $filename,
            ];

           
            $product = Product::create($data);

             DB::Commit();

            if($product){
               return redirect()->route('products')->with('success', 'Product added successfully!');
            }
            else{
                return redirect()->route('add.product')->with('error', 'Product not added successfully!');
            }
            
        }catch (\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
            return false;
        }
    }
}

