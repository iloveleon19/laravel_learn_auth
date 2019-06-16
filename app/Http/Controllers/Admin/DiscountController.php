<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $discounts= Discount::where('title','like',"%{$request->title}%")
            ->where(function ($query) use($request){
                if ($request->active > -1) {
                    $query->where('active',"{$request->active}");
                }
            })->paginate(2);

        return view('admin.discount.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actions = DB::table('actions')->orderBy('type','asc')->get();

        return view('admin.discount.create', compact('actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount= new Discount($request->except(['_token', 'start_at', 'end_at']));
        
        if ($request->start_at!='' && $request->end_at!='') {
            $start_at = new \DateTime($request->start_at);
            $end_at = new \DateTime($request->end_at);
            
            $discount->start_at = $start_at->format('Y-m-d H:i:s');
            $discount->end_at = $end_at->format('Y-m-d H:i:s');
        }

        $discount->created_id = Auth::guard('admin')->id();
        $discount->save();

        return redirect()->back()->with('post_alert', 'Success !!');
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
