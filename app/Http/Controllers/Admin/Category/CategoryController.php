<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//--------read----------
    public function category(){
        $category= Category::all();
        return view('admin.category.category',compact('category'));
    }

//--------- Insert------------
    public function Storecategory(Request $request){
        $validatedData = $request->validate([
            'category_name'  => 'required|unique:categories|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $category= DB::table('categories')->insert($data);

        $category= new Category;
        $category->category_name = $request->category_name;
        $category->save();

        if($category){
            $notification = array(
                'message'=>'Successfully Category Inserted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

//------ delete -------------
    public function deleteCategory($id){
        DB::table('categories')->where('id',$id)->delete();
        
        $notification = array(
            'message'=>'Successfully Category Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//--------edit----------------
    public function editCategory($id){
        $category=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit_category',compact('category'));
    }

//-------update------
    public function updatecategory(Request $request,$id){
        $validatedData = $request->validate([
            'category_name'  => 'required|max:55',
        ]);

        $data=array();
        $data['category_name']=$request->category_name;
        $category= DB::table('categories')->where('id',$id)->update($data);

        if($category){
            $notification = array(
                'message'=>'Successfully Category Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('categories')->with($notification);
        }else{
            $notification = array(
                'message'=>' Nothing to Update!',
                'alert-type'=>'success'
            );
            return redirect()->route('categories')->with($notification);
        }
    }

}
