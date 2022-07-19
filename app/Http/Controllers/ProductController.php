<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Redirect;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    { 
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
       // $products = DB::table('products')->get();

       $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.*', 'products.*')
            ->get();

       return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $levels = DB::table('categories')->get();
       $levels = DB::table('categories')->where('parent_id','0')->get();
       
       return view('admin.product.create',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->parent_id;
        $data['description']=$request->description;
        $data['url']= Str::slug($request->product_name);
        $data['price']= $request->price;
        $data['status']=1;
        
       $image = $request->product_name;
       
    if($image ==""){
        echo "Please Select Image";
        exit();
    }else{
        $imageName0 = $image->getClientOriginalName();
        $imageName = time().$imageName0;
        $uploadPath = 'img/';
        $uploadPath2 = 'public/img/';
        $image->move($uploadPath,$imageName);
        $data['image']=$imageUrl = $uploadPath2.$imageName;
        
    }
        
        DB::table('products')->insert($data);

        Session::put('storeProduct','Card Save Successfully');
        return Redirect::to('/create-product');
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
       $product = DB::table('products')->where('id',$id)->first();
       $data['cards'] = DB::table('categories')->where('id',$product->category_id)->first();
       $data['levels'] = DB::table('categories')->where('parent_id','0')->get();
       $data['product'] = DB::table('products')->where('id',$id)->first();

       return view('admin.product.edit',$data);
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
        $product_id =$request->product_id;
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['description']=$request->description;
        $data['price']=$request->price;
        $data['url']= Str::slug($request->product_name);
        $status = $request->status;
        
        $image = $request->product_image;
        
       
        if($image ==""){
            $product_dt = DB::table('products')->where('id',$product_id)->first();
           $data['image']=$product_dt->image;
        }else{
            
            $imageName0 = $image->getClientOriginalName();
            $imageName = time().$imageName0;
            $uploadPath = 'img/';
            $uploadPath2 = 'public/img/';
            $image->move($uploadPath,$imageName);
            $data['image']=$imageUrl = $uploadPath2.$imageName;
            
        }
        
        if(empty($status)){
            $status =0;
        }
        $data['status']=$status;

        DB::table('products')->where('id',$product_id)->update($data);

        Session::put('updateProduct','Card Updated Successfully');
        return Redirect::to('/view-products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('products')->where('id',$id)->delete();
        Session::put('deleteProduct','Card deleted Successfully');
        return Redirect::to('/view-products');
    }
}
