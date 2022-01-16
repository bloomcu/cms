<?php

namespace Cms\Http\Rates;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Rates\Rate;
use Cms\Domain\Rates\RateTable;
use Error;

class RateTableRatesController extends Controller
{
    
    /*
        TODO:
        - Validation
        - Error handling
        - Use Resource controller
     */
    
    public function store(Organization $organization, Request $request) {
        
        $table_name = $request['name'];
        $table_rates = json_decode($request->input('rates'), true);
        try {
            $table = RateTable::create(
                [
                    'name'=>$table_name,
                    'organization_id'=>$organization->id
                ]
            );
            $table->save();
            foreach ($table_rates as $table_rate) {
                $table->rates()->save(Rate::create($table_rate));
            }
        } catch(Error $error) {

        }
       
    }
}
