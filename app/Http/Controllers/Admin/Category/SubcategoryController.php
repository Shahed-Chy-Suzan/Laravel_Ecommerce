<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Subcategory;
use DB;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategory(){
        $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')
                    ->join('categories','subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category_name')
                    ->get();
            return view('admin.category.subcategory',compact('category','subcategory'));
    }

//------------insert------------
    public function Storesubcategory(Request $request){
        $validatedData = $request->validate([
            'category_id'  => 'required',
            'subcategory_name'  => 'required',
        ]);

        $data= array();
        $data['subcategory_name']=$request->subcategory_name;
        $data['category_id']=$request->category_id;

        DB::table('subcategories')->insert($data);
        $notification = array(
            'message'=>'Successfully Subcategory Inserted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//------------delete--------
    public function deletesubcategory($id){
        DB::table('subcategories')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Successfully Subcategory Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//--------edit----------------
    public function editsubcategory($id){
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('admin.category.edit_subcategory',compact('subcategory','category'));
    }

//-------update------
    public function updatesubcategory(Request $request,$id){
        $validatedData = $request->validate([
            'subcategory_name'  => 'required',
        ]);

        $data=array();
        $data['subcategory_name']=$request->subcategory_name;
        $data['category_id']=$request->category_id;
        $subcategory= DB::table('subcategories')->where('id',$id)->update($data);

        $notification = array(
            'message'=>'Successfully Subcategory Updated',
            'alert-type'=>'success'
        );
        return redirect()->route('subcategories')->with($notification);
    }





}
