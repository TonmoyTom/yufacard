<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Redirect;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:card-name-create|card-name-edit|card-name-delete', ['only' => ['index','show']]);
         $this->middleware('permission:card-name-create', ['only' => ['create','store']]);
         $this->middleware('permission:card-name-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:card-name-delete', ['only' => ['destroy']]);
         
         $this->middleware(['auth','verified']);
    }

    public function index()
    {
       $categories = DB::table('categories')->get();
       return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $levels = DB::table('categories')->where('parent_id','0')->get();
       
       return view('admin.category.create',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name']=$request->category_name;
        $data['parent_id']=0;
        $data['description']=$request->description;
        $data['url']= Str::slug($request->category_name);
        $data['status']=1;
        $data['created_at']=date('Y-m-d H:i:s');;
        $data['updated_at']=date('Y-m-d H:i:s');;
        DB::table('categories')->insert($data);

        Session::put('storeCategory','Card Save Successfully');
        return Redirect::to('/create-category');
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
       $data['cards'] = DB::table('categories')->where('id',$id)->first();
       $data['levels'] = DB::table('categories')->where('parent_id','0')->get();

       return view('admin.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category_id =$request->category_id;
        $data['name']=$request->category_name;
        $data['parent_id']=$request->parent_id;
        $data['description']=$request->description;
        $data['url']= Str::slug($request->category_name);
        $data['status']=1;
        DB::table('categories')->where('id',$category_id)->update($data);

        Session::put('updateCategory','Card Updated Successfully');
        return Redirect::to('/view-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('categories')->where('id',$id)->delete();
        Session::put('deleteCategory','Card deleted Successfully');
        return Redirect::to('/view-categories');
    }
}
