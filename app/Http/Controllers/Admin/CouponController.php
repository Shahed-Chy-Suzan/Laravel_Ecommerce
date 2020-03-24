<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Coupon;
use DB;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//--------read-------
    public function coupon(){
        $coupon=DB::table('coupons')->get();
        return view('admin.coupon.coupon',compact('coupon'));
    }

//--------enter----------
    public function storeCoupon(Request $request){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        $coupon=DB::table('coupons')->insert($data);

        $notification = array(
            'message'=>'Successfully Coupon Inserted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//------ delete -------------
    public function deleteCoupon($id){
        DB::table('coupons')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Successfully Coupon Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//--------edit----------------
    public function editCoupon($id){
        $coupon=DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.edit_coupon',compact('coupon'));
    }

//-------update------
    public function updateCoupon(Request $request,$id){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        $coupon= DB::table('coupons')->where('id',$id)->update($data);

        $notification = array(
            'message'=>'Successfully Coupon Updated',
            'alert-type'=>'success'
        );
        return redirect()->route('coupons')->with($notification);
    }


//---------------//------------------//-----------------//----------------//-------------------//


//----------------Newsletter--------------------
    public function newsletter(){
        $newsletter=DB::table('newsletters')->get();
        return view('admin.coupon.newsletter',compact('newsletter'));
    }
//------ delete -------------
    public function deletenewsletter($id){
        DB::table('newsletters')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Successfully  Deleted Done',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//------------SEO------------
    public function Seo()
    {
        $seo=DB::table('seo')->first();
        return view('admin.coupon.seo',compact('seo'));
    }

    public function UpdateSeo(Request $request)
    {
        $id=$request->id;
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_description']=$request->meta_description;
        $data['google_analytics']=$request->google_analytics;
        $data['bing_analytics']=$request->bing_analytics;
        DB::table('seo')->where('id',$id)->update($data);
        
        $notification=array(
                'message'=>'SEO Updated',
                'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



}

