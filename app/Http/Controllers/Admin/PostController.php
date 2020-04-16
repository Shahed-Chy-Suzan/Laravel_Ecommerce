<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//-----------PostCategory Name-------------------------
//----read-----
    public function postCategory(){
        $categoryName=DB::table('post_category')->get();
        return view('admin.blog.indexCategory',compact('categoryName'));
    }

//-------create-----
    public function addCategory(){
        return view('admin.blog.createCategory');
    }

    public function storeCategory(Request $request){
        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_bn']=$request->category_name_bn;

        DB::table('post_category')->insert($data);

        $notification=array(
            'message'=>'Successfully Category Inserted ',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

//----delete-------
    public function deleteCat($id){
        DB::table('post_category')->where('id',$id)->delete();

        $notification=array(
                'message'=>'Successfully Category Deleted ',
                'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

//---------edit-----
    public function editCat($id){
        $post_category=DB::table('post_category')->where('id',$id)->first();
        return view('admin.blog.editCategory',compact('post_category'));
    }

    public function updateCat(Request $request,$id){
        $data=array();
        $data['category_name_en']= $request->category_name_en;
        $data['category_name_bn']= $request->category_name_bn;

        DB::table('post_category')->where('id',$id)->update($data);
        $notification=array(
                'message'=>'Successfully Post Update ',
                'alert-type'=>'success'
            );
        return Redirect()->route('postCategory.name')->with($notification);
    }







//------------Add/All Post Category--------------------------
//------create-----
    public function create()
    {
    	$category=DB::table('post_category')->get();
    	//return response()->json($category);
    	return view('admin.blog.create',compact('category'));
    }

    public function store(Request $request)
    {
    	$data=array();
    	$data['post_title_en']=$request->post_title_en;
    	$data['post_title_bn']=$request->post_title_bn;
    	$data['category_id']=$request->category_id;
    	$data['details_en']=$request->details_en;
    	$data['details_bn']=$request->details_bn;

    	$post_image=$request->file('post_image');
    	if ($post_image) {
    		    $image_one_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(400,240)->save('public/media/post/'.$image_one_name);
                $data['post_image']='public/media/post/'.$image_one_name;
                DB::table('posts')->insert($data);
                $notification=array(
                     'message'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);

    	}else{
    		 $data['post_image']='';
              DB::table('posts')->insert($data);
               $notification=array(
                     'message'=>'Successfully Post Inserted without Image',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    	}
    }

//-----------read------------
    public function index()
    {
    	$post=DB::table('posts')->join('post_category','posts.category_id','post_category.id')
    	      ->select('posts.*','post_category.category_name_en')->get();
    	return view('admin.blog.index',compact('post'));
    }

//-----------delete----------------
    public function destroy($id)
    {
    	$post=DB::table('posts')->where('id',$id)->first();
        $image=$post->post_image;
        if($image){
            unlink($image);
        }
        DB::table('posts')->where('id',$id)->delete();

    	$notification=array(
                'message'=>'Successfully Post Deleted ',
                'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

//-----------Update----------------
    public function edit($id)
    {
    	$post=DB::table('posts')->where('id',$id)->first();
    	return view('admin.blog.edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
    	$oldimage=$request->old_image;
    	$data=array();
    	$data['post_title_en']=$request->post_title_en;
    	$data['post_title_bn']=$request->post_title_bn;
    	$data['category_id']=$request->category_id;
    	$data['details_en']=$request->details_en;
    	$data['details_bn']=$request->details_bn;
        $post_image=$request->file('post_image');

    	 if ($post_image) {
            if($oldimage){
                unlink($oldimage);
            }
    		    $image_one_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(400,240)->save('public/media/post/'.$image_one_name);
                $data['post_image']='public/media/post/'.$image_one_name;
                DB::table('posts')->where('id',$id)->update($data);
                $notification=array(
                     'message'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.blogpost')->with($notification);

    	 }else{
    		   $data['post_image']=$oldimage;
               DB::table('posts')->where('id',$id)->update($data);
               $notification=array(
                     'message'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.blogpost')->with($notification);
    	}
    }


}
