<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class ProductController extends Controller
{
    public function ProductView($id,$product_name)
    {
    	$product=DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('subcategories','products.subcategory_id','subcategories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')->where('products.id',$id)->first();

    	$color=$product->product_color;
    	$product_color = explode(',', $color);

    	$size=$product->product_size;
    	$product_size = explode(',', $size);
      return  view('pages.product_details',compact('product','product_color','product_size'));
    }

    public function AddCart(Request $request,$id)
    {
    	 $product=DB::table('products')->where('id',$id)->first();
    	  $data=array();
    	  if ($product->discount_price == NULL) {
    	  	            $data['id']=$id;
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
                       return Redirect()->to('/')->with($notification);
    	   }else{
    	                $data['id']=$id;
    	                $data['name']=$product->product_name;
    	                $data['qty']=$request->qty;
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
                       return Redirect()->to('/')->with($notification);
    	 }
    }
    

//---for subcategory Product showing-----
    public function productsView($id)
    {
         $products=DB::table('products')->where('subcategory_id',$id)->paginate(30);
         $brands= DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();

         return view('pages.all_products',compact('products','brands'));
    }


}
