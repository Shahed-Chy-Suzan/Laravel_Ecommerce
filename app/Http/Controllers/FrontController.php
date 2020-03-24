<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{
    public function storeNewsletter(Request $request){
        $validatedData = $request->validate([
            'email'  => 'required|unique:newsletters|max:55',
        ]);

        $data=array();
        $data['email']=$request->email;
        $category= DB::table('newsletters')->insert($data);

        $notification = array(
            'message'=>'Thanks for subscribing',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


//-----------Order Tracking----------
    public function OrderTracking(Request $request)
    {
         $code=$request->code;

         $track=DB::table('orders')->where('status_code',$code)->first();
         if ($track) {
             return view('pages.track',compact('track'));
         }else{
               $notification=array(
                'message'=>'Status code invalid ',
                'alert-type'=>'error'
                );
             return Redirect()->back()->with($notification);
         }
    }


//-----------User Order View--------------
    public function UserOrderView($id)
    {
        $order=DB::table('orders')
            ->join('users','orders.user_id','users.id')
            ->select('users.name','users.phone','orders.*')
            ->where('orders.id',$id)
            ->first();

        $shipping=DB::table('shipping')->where('order_id',$id)->first();

        $details=DB::table('order_details')
                ->join('products','order_details.product_id','products.id')
                ->select('products.product_code','products.image_one','order_details.*')
                ->where('order_details.order_id',$id)
                ->get();

        return view('pages.view_order',compact('order','shipping','details'));
    }


//-------------Search-------------
    public function ProductSearch(Request $request)
    {
        $brands=DB::table('brands')->get();
        $item=$request->search;
        $products=DB::table('products')
                //->join('brands','products.brand_id','brands.id')
                //->select('products.*','brands.brand_name')
                ->where('product_name','LIKE', "%{$item}%")
                //->orWhere('brand_name','LIKE', "%{$item}%")
                ->paginate(20);
        return view('pages.search',compact('brands','products'));
    }




}
