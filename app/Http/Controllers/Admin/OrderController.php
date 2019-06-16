<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Order::select('product_id')->groupBy(['product_id'])->paginate(2);

        $orders = Order::select('product_id')
            ->selectRaw('COUNT(*) AS order_count, SUM(price) AS order_price, SUM(amount) AS order_amount')
            ->where('price', '>', '0')
            ->whereIn('product_id', $results->toArray())
            ->groupBy(['product_id'])
            ->get()->keyBy('product_id');
        
        $stocks = Order::select('product_id')
            ->selectRaw('COUNT(*) AS stock_count, SUM(-`price`) AS stock_price, SUM(amount) AS stock_amount')
            ->where('price', '<', '0')
            ->whereIn('product_id', $results->toArray())
            ->groupBy(['product_id'])
            ->get()->keyBy('product_id');

        foreach ($results as $result) {
            $key = $result->product_id;
            collect($stocks[$key])->each(function($item, $index) use($result) {
                $result->$index=$item;
            });
            collect($orders[$key])->each(function($item, $index) use($result) {
                $result->$index=$item;
            });
            $result->total_result = $result->order_price - $result->stock_price;
        }

        return view('admin.order.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
