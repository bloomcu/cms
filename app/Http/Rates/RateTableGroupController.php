<?php

namespace Cms\Http\Rates;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;
use Cms\Domain\Rates\RateTableGroup;

class RateTableGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $rate_group_id = $request['rate_group_id'];
        // $rate_group = RateTableGroup::with('rates')
        //     ->orderBy('rates.row_id')
        //     ->orderBy('rates.col_id')
        //     ->get();
        return RateTableGroup::leftJoin('rates', 'rates.rate_table_group_id', '=', 'rate_table_group_id.id')
            ->with('rates')
            ->orderBy('rates.row_id', 'asc')
            ->orderBy('rates.col_id', 'asc')
            ->find($rate_group_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
