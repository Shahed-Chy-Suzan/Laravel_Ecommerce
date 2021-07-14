<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Response;
use Auth;
use Session;

class CartController extends Controller
{

        //-----------------------------------------------------------------------
                    //---Page reload chara 'cart add' korar jonno
        //-----------------------------------------------------------------------
//Nicher code ta main index page e 'add to cart' e click korlei Ajax diye auto load charai 'Cart' e add hoye notification asto,sei bebostar jonno code ta likha hoyechilo,kinto pore frontend theke sob data(size,color) soho niye jaowar jonno 'modal' use kore kaj kora hoyeche,tai ota r lagteche na ekn..

//--ekhane arrray($data['qty']) er vlaue gula package er documentation dekhe likte hobe,-----
//-----cart add----------
    public function AddCart($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $data=array();
        if ($product->discount_price == NULL) {
            $data['id']=$product->id;               //------if NO discount is available----------
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']= $product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']='';
            $data['options']['size']='';
            //return response()->json($data);
            Cart::add($data);
            return response()->json(['success' => 'Successfully Added on your Cart']);
        }else{
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;                          //------if discount available----------
            $data['price']= $product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']='';
            $data['options']['size']='';
            //return response()->json($data);
            Cart::add($data);
            return response()->json(['success' => 'Successfully Added on your Cart']);
        }
    }
//---------------------------------------------------------


//-----Checking added cart by hitting '/check' in route manually---------
    public function check()
    {
    	$content=Cart::content();
    	return response()->json($content);
    }


//---------showing cart--------------
    public function showCart()
    {
        $cart=Cart::content();
        return view('pages.cart',compact('cart'));
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);

        $notification=array(
            'message'=>'Product Removed from Cart',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UpdateCart(Request $request)
    {
        $rowId =$request->productid;
        $qty=$request->qty;
        Cart::update($rowId, $qty);

        $notification=array(
            'message'=>'Product Quantity Updated',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }



//-----------------------------------------------------------------------------------------
        //---Page reload kore 'cart add' korar jonno---//
//-----------------------------------------------------------------------------------------
//----Modal tai data gula view koranor jonno---//(Model ta index pager er niche royeche)----
    public function ViewProduct($id)
    {
         $product=DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('subcategories','products.subcategory_id','subcategories.id')
                ->join('brands','products.brand_id','brands.id')
                ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
                ->where('products.id',$id)->first();

        $color=$product->product_color;
        $product_color = explode(',', $color);

        $size=$product->product_size;
        $product_size = explode(',', $size);

       // return response()->json($product_color);
        return response::json(array(
                'product' => $product,
                'color' => $product_color,
                'size' => $product_size,
         ));
    }

//-----------Modal theke data gula niye asha/cart_er_DB te save/insert kora-----------
    public function InsertCart(Request $request)
    {
          $id=$request->product_id;
          $product=DB::table('products')->where('id',$id)->first();
          $data=array();
          if ($product->discount_price == NULL) {
                $data['id']=$product->id;           //------if NO discount is available----------
                $data['name']=$product->product_name;
                $data['qty']=$request->qty;
                $data['price']= $product->selling_price;
                $data['weight']=1;
                $data['options']['image']=$product->image_one;
                $data['options']['color']=$request->color;
                $data['options']['size']=$request->size;
                Cart::add($data);
                $notification=array(
                    'message'=>'Successfully Cart Added',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
           }else{
                $data['id']=$product->id;
                $data['name']=$product->product_name;
                $data['qty']=$request->qty;           //------if discount available----------
                $data['price']= $product->discount_price;
                $data['weight']=1;
                $data['options']['image']=$product->image_one;
                $data['options']['color']=$request->color;
                $data['options']['size']=$request->size;
                Cart::add($data);
                $notification=array(
                    'message'=>'Successfully Cart Added',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
         }
    }

//--------------------------------------------------------------------------------------------------

    public function Checkout()
    {
        if (Auth::check()) {
              $cart=Cart::content();
              return view('pages.checkout',compact('cart'));
        }else{
           $notification=array(
                'message'=>'AT first login your account',
                'alert-type'=>'success'
            );
          return redirect()->route('login')->with($notification);
        }
    }


    public function Wishlist()
    {
        $userid=Auth::id();
        $product=DB::table('wishlists')
                    ->join('products','wishlists.product_id','products.id')
                    ->select('products.*','wishlists.user_id')
                    ->where('wishlists.user_id',$userid)
                    ->get();
        return view('pages.wishlist',compact('product'));
    }

    public function Remove($id)
    {
        $userid=Auth::id();
        $product=DB::table('wishlists')->where('wishlists.user_id',$userid)->where('wishlists.product_id',$id)->delete();

        $notification=array(
            'message'=>'Successfully Deleted from Wishlist',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function Coupon(Request $request)
    {
        $coupon=$request->coupon;
        $check=DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
              session::put('coupon',[
                    'name'    => $check->coupon,
                    'discount'=> $check->discount,
                    'balance' => Cart::Subtotal() - $check->discount
                    //'balance' => Cart::Subtotal()    //- $check->discount
//--ekhane 'a non well formed numeric value entered' error/problem ta asteche,tai comment kore dechi.
              ]);
                $notification=array(
                    'message'=>'Successfully Coupon Applied',
                    'alert-type'=>'success'
                );
            return redirect()->back()->with($notification);
        }else{
                $notification=array(
                    'message'=>'Invalid Coupon',
                    'alert-type'=>'error'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function CouponRemove()
    {
        session::forget('coupon');

        $notification=array(
            'message'=>'Coupon Removed Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PymentPage()
    {
      $cart=Cart::content();
      return view('pages.payment',compact('cart'));
    }



}
