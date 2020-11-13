<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//----------------------------------------------------------------------------
// --ekhane Database onosare "Status" er term gular rules holo :--
//         Status = 0 = Pending
//         Status = 1 = Payment_Accepted
//         Status = 2 = Delivery_Progress
//         Status = 3 = Successfully_Delivered
//         Status = 4 = Cancel_Order
//----------------------------------------------------------------------------


//----adminPanel new_order------
    public function NewOrder()
    {
        $order=DB::table('orders')->where('status',0)->get();
        return view('admin.order.pending',compact('order'));
    }

//----adminPanel View_Order------
    public function ViewOrder($id)
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

        return view('admin.order.view_order',compact('order','shipping','details'));
    }

//-------------------------------
    public function PaymentAccept($id)
    {
        DB::table('orders')->where('id',$id)->update(['status'=>1]);
        $notification=array(
                'message'=>'Payment Accept Done',
                'alert-type'=>'success'
        );
        return Redirect()->route('admin.neworder')->with($notification);
    }

    public function PaymentCancel($id)
    {
        DB::table('orders')->where('id',$id)->update(['status'=>4]);
        $notification=array(
                'message'=>'Order is Cancelled',
                'alert-type'=>'danger'
        );
        return Redirect()->route('admin.neworder')->with($notification);
    }

//-----------nav---------------
    public function AcceptPaymentOrder()
    {
        $order=DB::table('orders')->where('status',1)->get();
        return view('admin.order.pending',compact('order'));
    }

    public function CancelPaymentOrder()
    {
        $order=DB::table('orders')->where('status',4)->get();
        return view('admin.order.pending',compact('order'));
    }

    public function ProgressPaymentOrder()
    {
        $order=DB::table('orders')->where('status',2)->get();
        return view('admin.order.pending',compact('order'));
    }

    public function SuccessPaymentOrder()
    {
        $order=DB::table('orders')->where('status',3)->get();
        return view('admin.order.pending',compact('order'));
    }

    public function DeleveryProgress($id)
    {
        DB::table('orders')->where('id',$id)->update(['status'=>2]);
        $notification=array(
                'message'=>'Send To Delivery',
                'alert-type'=>'success'
        );
        return Redirect()->route('admin.accept.payment')->with($notification);
    }


    public function DeleveryDone($id)
    {
//----------- For removing product from "stock" after delevery ---------------------
        $product=DB::table('order_details')->where('order_id',$id)->get();
        foreach ($product as $row) {
            DB::table('products')
              ->where('id',$row->product_id)
              ->update(['product_quantity' => DB::raw('product_quantity -'.$row->quantity)]);
        }

//----delevery done------
        DB::table('orders')->where('id',$id)->update(['status'=>3]);
        $notification=array(
                'message'=>'Delivery Done Successfully',
                'alert-type'=>'success'
        );
        return Redirect()->route('admin.success.payment')->with($notification);
    }


}
