<?php

namespace App\DataTables;

use App\Models\Produkhukum;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Gate;

class ProdukHukumDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('nama_kategori', function($prokum){
                return $prokum->category->nama_kategori;
            })
            ->addColumn('download', function($row){
                return ;
            })
            ->addColumn('action', function($row){
                $action = '';
                if(Gate::allows('update status prokum')){
                    $action = '<a href="'.route('ubah-status.prokum', [ 'id' => $row->id ]).'" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i>Ubah Status</a> ';
                }
                if(Gate::allows('read prokum')){
                    $action .= '<a href="'.asset($row->path_file).'" class="btn btn-sm btn-success"><i class="fas fa-download"></i></a> ';
                }
                if(Gate::allows('update prokum')){
                    $action .= '<a href="'.route('edit.prokum', [ 'id' => $row->id ]).'" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a> ';
                }
                if(Gate::allows('delete prokum')){
                    $action .= '<button type="button" onclick="confirmDelete(`'.route('delete.prokum', [ 'id' => $row->id ]).'`)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                }
                return $action;
            })
            // ->addColumn('path_file')
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProdukHukum $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Produkhukum $model): QueryBuilder
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('produkhukum-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
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
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('tahun'),
            Column::make('nama'),
            Column::make('nama_kategori')->title('Ketegori'),
            Column::make('nama_file'),
            Column::make('status'),
            Column::make('action')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ProdukHukum_' . date('YmdHis');
    }
}
