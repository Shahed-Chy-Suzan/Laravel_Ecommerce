<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{

//----------------applied AJAX here------------------------------
    public function AddWishlist($id)
    {
    	$userid=Auth::id();
    	$check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	$data = array(
    		'user_id' => $userid,
    		'product_id'=>$id
    	);

    	if (Auth::check()) {
    		if ($check) {
    			 //return \Response::json(['error' => 'Product Already has on your wishlist']);
                return response()->json(['error' => 'Product Already has on your wishlist']);
    		}else{
    			DB::table('wishlists')->insert($data);
                //return \Response::json(['success' => 'Successfully Added on your wishlist']);
             return response()->json(['success' => 'Successfully Added on your wishlist']);
    		}
    	}else{
    		//return \Response::json(['error' => 'At first login your account']);
            return response()->json(['error' => 'At first login your account']);
    	}

    }

//--------------without ajax method(normally toastr)------------
    // public function AddWishlist($id)
    // {
    // 	$userid=Auth::id();
    // 	$check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    // 	$data = array(
    // 		'user_id' => $userid,
    // 		'product_id'=>$id
    // 	);

    // 	if (Auth::check()) {
    // 		if ($check) {
    //              //return \Response::json(['error' => 'Product Already has on your wishlist']);
    //              $notification=array(
    //                 'message'=>'Product Already has on your wishlist ',
    //                 'alert-type'=>'error'
    //             );
    //             return Redirect()->back()->with($notification);
    // 		}else{
    //             DB::table('wishlists')->insert($data);
    //             //return \Response::json(['success' => 'Successfully Added on your wishlist']);
    //             $notification=array(
    //                 'message'=>'Successfully Added on your wishlist',
    //                 'alert-type'=>'success'
    //             );
    //             return Redirect()->back()->with($notification);
    // 		}
    // 	}else{
    //         //return \Response::json(['error' => 'At first login your account']);
    //         $notification=array(
    //             'message'=>'At first login your account ',
    //             'alert-type'=>'warning'
    //         );
    //         return Redirect()->back()->with($notification);
    // 	}
    // }




}
