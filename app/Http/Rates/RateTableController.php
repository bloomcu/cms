<?php

namespace Cms\Http\Rates;

use Cms\Domain\Rates\RateTable;
use Cms\App\Controllers\Controller;
use Illuminate\Http\Request;

class RateTableController extends Controller
{
    public function index() {
        $rate_tables = RateTable::all();
        return $rate_tables;
    }
    // TODO: Use an API Resource to return this
    public function show($id) {
        // Left join to allow sorting by row, col id
        $rate_table = RateTable::leftJoin('rates', 'rates.rate_table_id', '=', 'rate_tables.id')
        ->with('rates')
        ->orderBy('rates.row_id', 'asc')
        ->orderBy('rates.col_id', 'asc')
        ->find($id);
        

        return $rate_table;
        
    }

    public function store(Request $request) {
        $table_name = $request['name'];
        $table_rates = $request[''];
    }
}
