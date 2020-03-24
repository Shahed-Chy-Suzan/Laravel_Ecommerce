<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//--------read----------
    public function brand(){
        $brand= Brand::all();
        return view('admin.category.brand',compact('brand'));
    }

//--------insert----------------
    public function Storebrand(Request $request){
        $validatedData = $request->validate([
            'brand_name'  => 'required|unique:brands|max:55',
        ]);

        $data=array();
        $data['brand_name']=$request->brand_name;
        $image = $request->file('brand_logo');
        if ($image) {
            $image_name= $image->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $extension= strtolower($ext);
            $image_full_name= $filename.time().'.'.$extension;
            $upload_path= 'public/media/brand/';
            $image_url= $upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['brand_logo']= $image_url;
            DB::table('brands')->insert($data);

            $notification = array(
                'message'=>'Successfully Brand Inserted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            DB::table('brands')->insert($data);
            $notification = array(
                'message'=>'Successfully Brand Inserted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }

//--------delete---------
    public function deleteBrand($id){
        $brand=DB::table('brands')->where('id',$id)->first();
        $image=$brand->brand_logo;

        $delete=DB::table('brands')->where('id',$id)->delete();

        if($delete){
            if($image){
                unlink($image);
            }
            $notification = array(
                'message'=>'Successfully Brand Deleted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message'=>'Something Went Wrong!',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

//--------edit----------------
    public function editBrand($id){
        $brand=DB::table('brands')->where('id',$id)->first();
        return view('admin.category.edit_brand',compact('brand'));
    }

//-------update------
    public function updateBrand(Request $request,$id){
        $validatedData = $request->validate([
            'category_name'  => 'max:55',
        ]);

        $data=array();
        $data['brand_name']=$request->brand_name;
        $image = $request->file('brand_logo');
        if ($image) {
            $image_name= $image->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $extension= strtolower($ext);
            $image_full_name= $filename.time().'.'.$extension;
            $upload_path= 'public/media/brand/';
            $image_url= $upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['brand_logo']= $image_url;
            if($request->old_logo){
                unlink($request->old_logo);
            }
            DB::table('brands')->where('id',$id)->update($data);

            $notification = array(
                'message'=>'Successfully Brand Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('brands')->with($notification);
        }else{
            $data['brand_logo']= $request->old_logo;
            DB::table('brands')->where('id',$id)->update($data);
            $notification = array(
                'message'=>'Successfully Brand Updated!',
                'alert-type'=>'success'
            );
            return redirect()->route('brands')->with($notification);
        }
    }



}




