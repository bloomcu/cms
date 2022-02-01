<?php

namespace Cms\Http\Tables;

use Cms\App\Controllers\Controller;

use Cms\Domain\Table\TableGroup;
use Illuminate\Http\Request;


class TableGroupsController extends Controller
{
    public function index() {
        return TableGroup::with('tables')->get();
    }

    public function store(Request $request) {
        TableGroup::create([
            'name'=>$request->get('name')
        ]);
        
    }
    public function update(TableGroup $table_group, Request $request) {
        $table_group->update([
            'name' => $request->get('name'),
        ]);
    }
    public function show(TableGroup $table_group) {
        return $table_group;
    }

    public function destroy(TableGroup $table_group) {
        $table_group->delete();
    }
}
