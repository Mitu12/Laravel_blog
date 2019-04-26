<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Symfony\Component\HttpFoundation\File\File;
session_start();
class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {       
         $this->authCheck();
        $admin_home=view('admin.admin_home');

         return view('admin.admin_master')
         ->with('admin_main_content',$admin_home);
    }
    public function logout(){
        Session::put('admin_name','');
        Session::put('admin_id','');
        Session::put('message','you are successfully logout');
        return Redirect::to('/admin');

    }

    public function authCheck(){

         $admin_id=Session ::get('admin_id');  
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function addCategory(){
        $this->authCheck();
        $add_category_page=view('admin.add_category');
        return view('admin.admin_master')
        ->with('admin_main_content',$add_category_page);

    }

    public function saveCategory(Request $request){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        DB::table('category')->insert($data);
        Session::put('message','Save Category successfully!!');
       return Redirect::to('/add-category');
    }
    public function manageCategory(){
$this->authCheck();
       
         $all_category = DB::table('category')
                
                ->get();
                 $manage_category=view('admin.manage_category')
                 ->with('all_category_info',$all_category);
           
        return view('admin.admin_master')
        ->with('admin_main_content',$manage_category);    }

        public function unpublishedCategory($category_id){
            DB::table('category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);
            return Redirect :: to('/manage-category');
        }

        public function publishedCategory($category_id){
            DB::table('category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);
            return Redirect :: to('/manage-category'); 

        }

        public function deleteCategory($category_id){
            DB::table('category')
            ->where('category_id', $category_id)
            ->delete();
            return Redirect :: to('/manage-category'); 

        }

        public function editCategory($category_id){
             $category_info = DB::table('category')
                ->where('category_id', $category_id)
            
                ->first();
                 $edit_category=view('admin.edit_category')
                 ->with('category_info',$category_info);
           
        return view('admin.admin_master')
        ->with('admin_main_content',$edit_category); 

        }

        public function updateCategory(Request $request){
            $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $category_id=$request->category_id;
        DB::table('category')
        ->where('category_id', $category_id)
        ->update($data);
       return Redirect::to('/manage-category');

        }

        public function addBlog(){
             $this->authCheck();
             $published_category=DB::table('category')
             // ->where('publication_status',1)
             ->get();
        $add_blog_page=view('admin.add_blog')
        ->with('published_category',$published_category);

        return view('admin.admin_master')
        ->with('admin_main_content',$add_blog_page);

        }
        public function saveBlog(Request $request){
           
        $data=array();
        $data['blog_title']=$request->blog_title;
        $data['category_id']=$request->category_id;
        $data['blog_short_description']=$request->blog_short_description;
         $data['blog_long_description']=$request->blog_long_description;
        $data['author_name']=Session::get('admin_name');
         $data['publication_status']=$request->publication_status;

         //image upload

         $files = $request->file('blog_image');
         $filename=$files->getClientOriginalName();
         // $extension=$files->getClientOriginalExtension();
         $picture=date('His').$filename;
         $image_url='public/post_image/'.$picture;
         $destinationPath = base_path().'/public/post_image/';
         $success=$files->move($destinationPath,$picture);
         if($success){
            $data['blog_image']=$image_url;
            DB::table('blog')->insert($data);
        Session::put('message','Save Blog successfully!!');
       return Redirect::to('/add-blog');
         }else{
            $error=$files->getErrorMessage();
         }


        
    }

    public function manageBlog(){
        $this->authCheck();
       
         $all_blog = DB::table('blog')
                
                ->get();
                 $manage_blog=view('admin.manage_blog')
                 ->with('all_blog_info',$all_blog);
           
        return view('admin.admin_master')
        ->with('admin_main_content',$manage_blog); 

    }
     public function unpublishedBlog($blog_id){
            DB::table('blog')
            ->where('blog_id', $blog_id)
            ->update(['publication_status' => 0]);
            return Redirect :: to('/manage-blog');
        }

        public function publishedBlog($blog_id){
            DB::table('blog')
            ->where('blog_id', $blog_id)
            ->update(['publication_status' => 1]);
            return Redirect :: to('/manage-blog'); 

        }

        public function deleteBlog($blog_id){
            DB::table('blog')
            ->where('blog_id', $blog_id)
            ->delete();
            return Redirect :: to('/manage-blog'); 

        }

            public function editBlog($blog_id){
                 $blog_info = DB::table('blog')
                    ->where('blog_id', $blog_id)
                
                    ->first();
                    $published_category=DB::table('category')
                    ->get();

                     $edit_blog=view('admin.edit_blog')
                     ->with('blog_info',$blog_info)
                     ->with('published_category ',$published_category);   

            return view('admin.admin_master')
            ->with('admin_main_content',$edit_blog); 

            }

        public function updateBlog(Request $request){
          $data=array();
        $data['blog_title']=$request->blog_title;
        $data['category_id']=1;
        $data['blog_short_description']=$request->blog_short_description;
         $data['blog_long_description']=$request->blog_long_description;
        $data['author_name']=Session::get('admin_name');
         $data['publication_status']=$request->publication_status;
         $blog_id=$request->blog_id;

         //image upload
         if($_FILES['blog_image']['name']==''){
            $data['blog_image']=$request->blog_image;
             DB::table('blog')
            ->where('blog_id',$blog_id)
            ->update($data);
        Session::put('message','Update Blog successfully!!');
       return Redirect::to('/edit-blog/'.$blog_id);

         }else{
              $files = $request->file('blog_image');
         $filename=$files->getClientOriginalName();
         // $extension=$files->getClientOriginalExtension();
         $picture=date('His').$filename;
         $image_url='public/post_image/'.$picture;
         $destinationPath = base_path().'/public/post_image/';
         $success=$files->move($destinationPath,$picture);
         if($success){
            $data['blog_image']=$image_url;
            DB::table('blog')
            ->where('blog_id',$blog_id)
            ->update($data);
        Session::put('message','Update Blog successfully!!');
        // unlink($request->post_image);
       return Redirect::to('/edit-blog/'.$blog_id);
         }else{
            $error=$files->getErrorMessage();
         }

         }
       

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
