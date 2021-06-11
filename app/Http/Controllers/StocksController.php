<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stock = Stock::all();

        //then display using the Index view
        return Inertia::render('Stocks/Index',
            ['stock' => $stock]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Stocks/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
                'id' => 'required|numeric|unique:stocks',
                'description' => 'required',
                'stock_category_id' => 'required',
                'uom' => 'required',
                'barcode' => 'required',
                'discontinued' => 'required',
            ]
        );
        $model = new Stock();
        $model->id = $request->id;
        $model->description = $request->description;
        $model->stock_category_id = $request->stock_category_id;
        $model->uom = $request->uom;
        $model->barcode = $request->barcode;
        $model->discontinued = $request->discontinued;
        $model->save();
        return redirect()->back()->with('success', 'New Stock Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stocks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $model =Stock::find($id);

        return Inertia::render('Stocks/View',['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stocks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stocks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
                'description' => 'required',
                'stock_category_id' => 'required',
                'uom' => 'required',
                'barcode' => 'required',
                'discontinued' => 'required',
        ]);
        $model = Stock::find($id);
        $model->update($validate);
        return Redirect::route('stock.index')->with('success', 'Stock Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stocks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            Stock::find($id)->delete();
            return Redirect::route('stock.index')->with('success', 'Stock deleted.');
           }catch (\Exception$e) {
         
            return Redirect::route('stock.index')->with('error', $e->getMessage());
    
        }
    }
}
