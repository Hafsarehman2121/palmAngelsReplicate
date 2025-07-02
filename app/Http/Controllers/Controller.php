<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\DataTables\UsersDataTable;
use App\DataTables\OrdersDataTable;
use App\DataTables\ProductsDataTable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public Function Home()
    {
        return view('index');
    }

     /**
     * Display Users Datatable.
     * @param \Illuminate\Http\DatatTables $dataTable
     * 
     * @return \Illuminate\Http\Resources\View
    */
     public function showUsers(UsersDataTable $datatable)
    {
        try{

            return $datatable->render('adminDashboard.usersDatatable');

        }catch(\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
        } 
    }

     /**
     * Display Products Datatable.
     * @param \Illuminate\Http\DatatTables $dataTable
     * 
     * @return \Illuminate\Http\Resources\View
    */

    public function showProducts(ProductsDataTable $datatable)
    {
        try{

             $products = Product::all();

            return $datatable->render('adminDashboard.productsDatatable', compact('products'));

        }catch(\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
        } 
    }

     /**
     * Display Orders Datatable.
     * @param \Illuminate\Http\DatatTables $dataTable
     * 
     * @return \Illuminate\Http\Resources\View
    */
    public function showOrders(OrdersDataTable $datatable)
    {
        try{

            // $users = User::all();
            // $totalUsers = $users->count();

            return $datatable->render('adminDashboard.ordersDatatable');

        }catch(\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
        } 
    }

     /**
     * Display Add Product Form.
     * @param \Illuminate\Http\DatatTables $dataTable
     * 
     * @return \Illuminate\Http\Resources\View
    */
    public function addProduct()
    {
        try{

            return view('adminDashboard.addProduct');

        }catch(\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
        } 
    }
}
