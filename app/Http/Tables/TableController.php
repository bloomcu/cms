<?php

namespace Cms\Http\Tables;


use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;
use Cms\Domain\Table\Table;
use Cms\Http\Tables\Requests\TableStoreRequest;

class TableController extends Controller
{
    public function index() {
        $tables = Table::all();
        return $tables;
    }

    public function show(Table $table) {
        return $table;
    }

    public function store(Table $table, TableStoreRequest $request) {
        // return $request->validated();
        $table::create($request->validated());

    }
    public function update(Table $table, TableStoreRequest $request) {
        $table->update($request->validated());
    }

    public function destroy(Table $table) {
        $table->delete();
    }
}
