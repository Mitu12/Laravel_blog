<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   $published_post=DB::table('blog')
    ->where('publication_status',1)
    ->orderBy('blog_id','desc')
    ->get();
        $home=view('pages.home')
        ->with('published_post',$published_post);
       return view('master') 
       ->with('main_content',$home);

    }
    public function contact(){
        $contact=view('pages.contact');
       return view('master') 
       ->with('main_content',$contact);

    }

    public function gallery(){
           $gallery=view('pages.gallery');
       return view('master') 
       ->with('main_content',$gallery);
    }
    public  function categories(){
        $categories = view('pages.categories');
        return view('master')
        ->with('main_content',$categories);
    }
        public  function archives(){
        $archives = view('pages.archives');
        return view('master')
        ->with('main_content',$archives);
    }

    public  function about(){
        $about = view('pages.about');
        return view('master')
        ->with('main_content',$about);
    }
    public function blogDetails($blog_id){
        $blog_info=DB::table('blog')
    ->where('blog_id',$blog_id)
    ->first();
    $data['hit_counter']=$blog_info->hit_counter+1;
    DB::table('blog')
    ->where('blog_id',$blog_id)
    ->update($data);
        $home=view('pages.blogDetails')
        ->with('blog_info',$blog_info);
       return view('master') 
       ->with('main_content',$home);


    }

    public function categoryBlog($category_id){
        $blog_category_Info=DB::table('blog')
    ->where('publication_status',1)
    ->where('category_id',$category_id)
    ->orderBy('blog_id','desc')
    ->get();
        $home=view('pages.home')
        ->with('published_post',$blog_category_Info);
       return view('master') 
       ->with('main_content',$home);



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
