<?php

namespace Cms\Http\Tables;

use Cms\App\Controllers\Controller;
use Cms\Domain\Table\Table;
use Cms\Domain\Table\TableGroup;
use Illuminate\Http\Request;

class TableGroupTablesController extends Controller
{
    //
    public function index(TableGroup $table_group) {
        return $table_group->tables;
        
    }


    public function store(TableGroup $table_group, Table $table) {
       
        $table_group->tables()->attach($table);
    }

    public function destroy(TableGroup $table_group, Table $table) {
        $table_group->tables()->detach($table);
    }
}
