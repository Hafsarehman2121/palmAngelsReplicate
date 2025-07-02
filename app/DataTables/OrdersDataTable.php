<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
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
            
            static $index = 0; // Static variable to maintain the index across multiple rows
            return ++$index + $this->request->get('start');
        })
        ->addColumn('orderDetails', function () {
            
           return "<a href='#'>Order Details</a>";
        })
        ->addColumn('action', function($data) {
            $id = $data->id;
           
            return "
                <div>
                    <a  id='viewBtn' data-id='$id'  class='text-primary' title='View'><i class='mdi mdi-eye'></i></a>
                   
                    <a type='button' id='deleteOrderBtn' data-id='$id' class='text-danger' title='Delete'>
                        <i class='mdi mdi-delete'></i>
                    </a>
                </div>
            ";
        })
        
        ->rawColumns(['#','action','orderDetails']); // Allow HTML rendering in the 'products' column

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery()->select('id','order-no','orderBy','orderCreationDate');

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('ordersDatatable')
        ->columns($this->getColumns())
        ->parameters(['ordering' => false,])
        ->minifiedAjax()
        //->dom('Bfrtip')
        ->orderBy(1)
        ->selectStyleSingle()
        ->scrollY(false)
        ->scrollX(false)
        ->autoWidth(true)
        
        ->buttons([
            Button::make('excel'),
            Button::make('csv'),
            Button::make('pdf'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')
        ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            ['data' => '#', 'name' => '#', 'title' => '#'],
            Column::make('order-no'),
            ['data' => 'orderBy', 'title' => 'Order By' ],
            ['data' => 'orderCreationDate', 'title' => ' Order Date' ],
            Column::make('orderDetails'),
            Column::make('action'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Orders_' . date('YmdHis');
    }
}
