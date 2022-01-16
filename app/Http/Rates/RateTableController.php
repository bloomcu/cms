<?php

namespace Cms\Http\Rates;

use Cms\Domain\Rates\RateTable;
use Cms\App\Controllers\Controller;
use Cms\Http\Rates\Resources\RateTableResource;
use Cms\Http\Rates\Resources\RateTablesCollection;
use Illuminate\Http\Request;

class RateTableController extends Controller
{
    public function index() {
        // $rate_tables = RateTable::all();
        
        return new RateTablesCollection(RateTable::all());
        // return $rate_tables;
    }
    
    // TODO: Left Join may be faster at scale
    public function show($id) {
        
        return new RateTableResource(RateTable::findOrFail($id));
        // Left join to allow sorting by row, col id
        // $rate_table = RateTable::leftJoin('rates', 'rates.rate_table_id', '=', 'rate_tables.id')
        // ->with('rates')
        // ->orderBy('rates.row_id', 'asc')
        // ->orderBy('rates.col_id', 'asc')
        // ->find($id);
        

        // return $rate_table;
        
    }
    
}
