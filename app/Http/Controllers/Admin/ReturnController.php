<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public  function request()
    {
        $order=DB::table('orders')->where('return_order',1)->get();
        return view('admin.return.request',compact('order'));
    }

    public function ApproveReturn($id)
    {
//----------- for removing product from "stock" after delevery ---------------------
        $product=DB::table('order_details')->where('order_id',$id)->get();
        foreach ($product as $row) {
            DB::table('products')
            ->where('id',$row->product_id)
            ->update(['product_quantity' => DB::raw('product_quantity +'.$row->quantity)]);
        }
//----making success of return------
        DB::table('orders')->where('id',$id)->update(['return_order'=>2]);
        $notification=array(
                'message'=>'Return Successfully done',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function AllReturn()
    {
    	$order=DB::table('orders')->where('return_order',2)->get();
    	return view('admin.return.all',compact('order'));
    }

//====================================================================================
//---------------Stock------------------------
    public function Stock()
    {
        $product=DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->select('products.*','categories.category_name')
                    ->get();
        return view('admin.stock.stock',compact('product'));

    }


}
