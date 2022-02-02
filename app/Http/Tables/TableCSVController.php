<?php

namespace Cms\Http\Tables;

use Cms\App\Controllers\Controller;
use Cms\Domain\Table\Table;
use Illuminate\Http\Request;
use League\Csv\Reader;

class TableCSVController extends Controller
{
    //
    public function store(Request $request) {
        
        // TODO: need better validation of Mimetype and data - max filsize(?)
        $validation = $request->validate([
            'name' => 'required|string',
            'data' => 'required|file'
        ]);

        $csv = Reader::createFromPath($validation['data'], 'r');
        $record =  [
            'name' => $validation['name'],
            'organization_id' => 1,
            'data' => $csv,
            
        ];
        // return $record;
        Table::create($record);
    }
}
