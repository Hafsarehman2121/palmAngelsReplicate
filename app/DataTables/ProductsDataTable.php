<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


class ProductsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        
        return (new EloquentDataTable($query))
            ->addColumn('#', function ($row) {
                // The serial number will be rendered on the client-side
                static $index = 0; // Static variable to maintain the index across multiple rows
                return ++$index + $this->request->get('start');
            })
            ->addColumn('productImage', function (Product $product) {
                $url = asset('public/assets/img' .$product->productImage);
                return '<img src='.$url.' style="width:50px; height:50px; border: 1px solid lightgrey;"/>'; 
            })
            ->addColumn('action', function( $data){
                $id = $data->id;
               // $editUrl = route('getProduct', $id); // Generate the route URL in PHP
               // $viewUrl = route('view.product', $id);
                return "<div>
                 <a href='' id='viewBtn' data-id='$id'  class='text-primary' title='View'><i class='mdi mdi-eye menu icon'></i></a>
                <a href='' id='editProductBtn' type='button' data-id='$id'   class='text-primary' title='Edit'><i class=''></i></a>
                <a id='deleteBtn'type='button' data-id='$id'  class='text-danger' title='Delete'><i class='mdi mdi-delete'></i></a>
                </div>";
               })
            ->rawColumns(['#','productImage', 'action'])
            
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $product): QueryBuilder
    {
        return $product->newQuery()->select('id','productPrice','productCode','productName','productImage', 'quantity', 'productDescription')->orderBy('created_at', 'desc');
         
       
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productsDatatable')
                    ->columns($this->getColumns())
                    ->parameters(['ordering' => false,
                                'scrollY' => ' ',
                                'scrollCollapse' => true,])
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    -> responsive(true)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            ['data' => '#', 'name' => '#', 'title' => '#'],
            Column::make('productName'),
            Column::make('productCode'),
            Column::make('productPrice'),
            Column::make('quantity'),
            Column::make('productImage'),
            Column::make('productDescription'),
           // Column::make('productImage'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}
