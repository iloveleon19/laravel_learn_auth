<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProduct;
use Image;
use App\Product;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_encode;

class ProductController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discounts = DB::table('discounts')->select('id','title')->where('active', '>', 0)->get();

        $fakeObj = (object)['id'=>'50','title'=>'this is id 50'];
        $discounts->push($fakeObj);

        return view('admin.product.create',compact('discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $request->validated();

        if (is_file($request->image)) {
            $photo = $request->image;

            $file_name = uniqid().'.'.$photo->getClientOriginalExtension();
            $file_relative_path = 'assess/images/content/'.date('Y-m-d');
            $file_path = public_path($file_relative_path);
            if (!is_dir($file_path)){
                mkdir($file_path,0775, true);
            }
            $thumbnail_file_path = $file_path . '/thumbnail-'.$file_name;
            Image::make($photo)->resize(200, null, function ($constraint) {$constraint->aspectRatio();})->save($thumbnail_file_path);
            
            $file_path .= '/'.$file_name;
            Image::make($photo)->save($file_path);
        }
        $product = new Product($request->except(['_token', 'image', 'active_at']));

        $product->created_id = Auth::guard('admin')->id();
        $product->img_path = $thumbnail_file_path;

        if ($request->active >0 && $request->active_at!='') {
            $active_at = new \DateTime($request->active_at);
            $product->active_at = $active_at->format('Y-m-d H:i:s');
        }

        $discountlength = is_array($request->discount) ? count($request->discount) : 0;

        if($discountlength>0){
            $counter = DB::table('discounts')->selectRaw('COUNT(*) AS count')->whereIn('id', $request->discount)->first();
            if($counter->count==$discountlength){
                $product->discount = json_encode($request->discount);
            }
        }
        
        $product->save();

        return response('Success !!', 200);
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
