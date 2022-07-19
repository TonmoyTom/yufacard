<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DeletedCard;
use DB;
use Redirect;
use Auth;
use Session;
use Mail;

class UserCardController extends Controller
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

public function index(){
    $user_data = Auth::user();
    $user_id = $user_data->id;
    $load_credit_requests = DB::table('load_credit_requests')->where('user_id',$user_id)->get();
    $card_orders = DB::table('order_card')->where('user_id',$user_id)->get();
    
    $statements = DB::table('statement')->where('user_id',$user_id)->get();
    

    return view('user_panel.home',compact('card_orders','statements','load_credit_requests'));
}

public function SavesendMoney(Request $request){
    $money = $request->money;
    $am = $request->amount;
    $user_info = Auth::user();
    
    $user_id = $user_info->id;
    $user_balance = $user_info->balance;
    // dd($user_balance);
    $user_email = $user_info->email;
    
    if($user_balance>$am){
        $bla['balance'] = $user_balance-$am;
        $update = DB::table('users')->where('email',$user_email)->update($bla);
    
    if($money=='SEPA'){
        $data['user_id']= $user_info->id;
        $data['email']= '';
        $data['payment_name']= $request->money;
        $data['beneficiary']= $request->beneficiary;
        $data['iban']= $request->iban;
        $data['bic']= $request->bic;
        $data['amount']= $request->amount;
        $data['status']= 0;
        $data['created_at']= date('Y-m-d H:i:s');
        $data['updated_at']= date('Y-m-d H:i:s');
    }else if($money=='Bitcoin'){
        $data['user_id']= $user_info->id;
        $data['email']= $request->email;
        $data['payment_name']= $request->money;
        $data['amount']= $request->amount;
        $data['status']= 0;
        $data['created_at']= date('Y-m-d H:i:s');
        $data['updated_at']= date('Y-m-d H:i:s');
    }else if($money=='Skrill'){
        $data['user_id']= $user_info->id;
        $data['email']= $request->email;
        $data['payment_name']= $request->money;
        $data['amount']= $request->amount;
        $data['status']= 0;
        $data['created_at']= date('Y-m-d H:i:s');
        $data['updated_at']= date('Y-m-d H:i:s');
    }else if($money=='Neteller'){
        $data['user_id']= $user_info->id;
        $data['email']= $request->email;
        $data['payment_name']= $request->money;
        $data['amount']= $request->amount;
        $data['status']= 0;
        $data['created_at']= date('Y-m-d H:i:s');
        $data['updated_at']= date('Y-m-d H:i:s');
    }else if($money=='Perfect Money'){
        $data['user_id']= $user_info->id;
        $data['email']= $request->email;
        $data['payment_name']= $request->money;
        $data['amount']= $request->amount;
        $data['status']= 0;
        $data['created_at']= date('Y-m-d H:i:s');
        $data['updated_at']= date('Y-m-d H:i:s');
    }
    $verify = DB::table('send_money')->insert($data);
    if($verify){
         session::put('success','Payment submitted successfully');
         return Redirect::to('/load');
        }else{ 
          session::put('success','Payment submition failed');
          return Redirect::to('/load');
        }
    }else{
        session::put('success','Payment submition failed due to less balance');
        return Redirect::to('/load');
    }
    
}

public function settings(){
   $user_data = Auth::user();
   $user_id = $user_data->id;
   $card_orders = DB::table('order_card')->where('user_id',$user_id)->get();
   $document = DB::table('verification')->where('user_id',$user_id)->first();

 return view('user_panel.settings',compact('card_orders','document'));
}

public function save_document(Request $request){
    $user_dt = Auth::user();
    $data['user_id']=$user_dt->id;
    $data['name']=$user_dt->name;
    $data['email']=$user_dt->email;
    $imagef = $request->fdocument; 
    $imageb = $request->bdocument;
    $imagev = $request->vdocument;
    
    $user_id = $user_dt->id;
    $check = DB::table('verification')->where('user_id',$user_id)->first();
    
    
   if($imagef =="" && isset($check->image_one)){
        $data['image_one'] = $check->image_one;
    }else if($imagef ==""){
      session::put('success','Please choose document');
      return Redirect::to('/settings');
    }
    else{
        $imageName0 = $imagef->getClientOriginalName();
        $imageName = time().$imageName0;
        $uploadPath = 'img/';
        $uploadPath2 = 'public/img/';
        $imagef->move($uploadPath,$imageName);
        $data['image_one'] = $uploadPath2.$imageName;
        
    }
    
    if($imageb =="" && isset($check->image_two)){
        $data['image_two'] = $check->image_two;
    }else if($imageb ==""){
      session::put('success','Please choose document');
      return Redirect::to('/settings');
    }
    else{
        $imageName1 = $imageb->getClientOriginalName();
        $imageName2 = time().$imageName1;
        $uploadPath = 'img/';
        $uploadPath3 = 'public/img/';
        $imageb->move($uploadPath,$imageName2);
        $data['image_two'] = $uploadPath3.$imageName2;
        
    }
    
    if($imagev =="" && isset($check->image_three)){
        $data['image_three'] = $check->image_three;
    }else if($imagev ==""){
      session::put('success','Please choose document');
      return Redirect::to('/settings');
    }else{
        $imageName3 = $imagev->getClientOriginalName();
        $imageName4 = time().$imageName3;
        $uploadPath = 'img/';
        $uploadPath4 = 'public/img/';
        $imagev->move($uploadPath,$imageName4);
        $data['image_three'] = $uploadPath4.$imageName4;
        
    }
    
    $data['created_at']=date('Y-m-d H:i:s');
    $data['updated_at']=date('Y-m-d H:i:s');
    $data['status']='2';
    
   if(!empty($check)){
       $verify = DB::table('verification')->where('user_id',$user_id)->update($data);
       if($verify){
         session::put('success','Document submitted successfully');
         return Redirect::to('/settings');
        }else{ 
          session::put('success','Document submition failed');
          return Redirect::to('/settings');
        }
   }else{
       $verify = DB::table('verification')->insert($data);
       if($verify){
         session::put('success','Document submitted successfully');
         return Redirect::to('/settings');
        }else{ 
          session::put('success','Document submition failed');
          return Redirect::to('/settings');
        }
   }
}

public function delete_document($id){
    $delete = DB::table('verification')->where('id',$id)->delete();
    if($delete){
         session::put('success','Document deleted successfully');
         return Redirect::to('/view-documents');
        }else{ 
          session::put('success','Document delete failed');
          return Redirect::to('/view-documents');
        } 
}

public function view_documents(){
    $documents = DB::table('verification')
        ->join('users', 'verification.user_id', '=', 'users.id')
        ->select('users.name', 'verification.*')
        ->get();
        
    return view('admin.documents.index',compact('documents'));
}

public function ViewsendMoney(){
    $sends = DB::table('send_money')
        ->join('users', 'send_money.user_id', '=', 'users.id')
        ->select('users.name', 'send_money.*')
        ->orderBy('send_money.id', 'DESC')
        ->get();
        
    return view('admin.sendMoney.index',compact('sends'));
}

public function ConfirmSendMoney($id){
    $veri_id = $id;
    $data['status'] =1;
    $datas = DB::table('send_money')->where('id',$veri_id)->update($data);
    
    if($datas){
     session::put('success','Send Money confirmed successfully');
     return Redirect::to('/view-send-money');
    }else{ 
      session::put('success','Send Money confirmation failed');
      return Redirect::to('/view-send-money');
    }
    
}

public function DeleteSendMoney($id){

    $datas = DB::table('send_money')->where('id',$id)->delete();
    
    if($datas){
     session::put('success','Send Money deleted successfully');
     return Redirect::to('/view-send-money');
    }else{ 
      session::put('success','Send Money delete failed');
      return Redirect::to('/view-send-money');
    }
    
}

public function edit_document($id){
    $veri_id = $id;
    $datas = DB::table('verification')->join('users', 'verification.user_id', '=', 'users.id')->where('verification.id',$veri_id)->select('users.name','users.country','users.phone','users.balance', 'verification.*')->first();
    return view('admin.documents.edit',compact('datas'));
}

public function update_document(Request $request){
    $veri_id = $request->id;
    $data['status']=$request->status;
    $datas = DB::table('verification')->where('id',$veri_id)->update($data);
    
     if($datas){
     session::put('success','Document confirmed successfully');
     return Redirect::to('/view-documents');
    }else{ 
      session::put('success','Document confirmation failed');
      return Redirect::to('/view-documents');
    }
}



public function profileUpdate(Request $request){

    $user_id = $request->user_id1;
    $image = $request->image;

   if($image ==""){
        echo "Please Select Image";
        exit();
    }else{
        $imageName0 = $image->getClientOriginalName();
        $imageName = time().$imageName0;
        $uploadPath = 'img/';
        $uploadPath2 = 'public/img/';
        $image->move($uploadPath,$imageName);
        $posts['avatar']=$imageUrl = $uploadPath2.$imageName;
        
    }


    $update = DB::table('users')->where('id',$user_id)->update($posts);
    
    if($update){
        echo "Uploaded";
    }else{
        echo "Failed";
    }

}

public function phoneUpdate(Request $request){

    $user_id = $request->user_id2;
    $user['phone'] = $request->phone;

    $update = DB::table('users')->where('id',$user_id)->update($user);
    
    if($update){
       session::put('success','Phone Number Updated successfully');
     return Redirect::to('/settings');
    }else{
        session::put('success','Phone Number Updated failed');
     return Redirect::to('/settings');
    }

}

public function passwordUpdate(Request $request){

    $user_id = $request->user_id2;
    $old_password = $request->old_password;
    $new_password = $request->new_password;
    
    $user = DB::table('users')->where('id',$user_id)->first();

    if(\Hash::check($old_password, $user->password)){
        $data['password']= \Hash::make($new_password);
        $update = DB::table('users')->where('id',$user_id)->update($data);

        session::put('success','Password Updated successfully');
        return Redirect::to('/settings');

    }else{
        session::put('success','Password not matched');
        return Redirect::to('/settings');
    }

}

public function payments(){
    $user_data = Auth::user();
    $user_id = $user_data->id;
   $order_credit = DB::table('order_credit')->where('user_id',$user_id)->get();
   $send_monies = DB::table('send_money')->join('users', 'send_money.user_id', '=', 'users.id')
        ->select('users.name', 'send_money.*')->where('send_money.user_id',$user_id)->where('users.id',$user_id)->get();
    return view('user_panel.payments',compact('order_credit','send_monies'));
}

public function load(){
    return view('user_panel.load.index');
}

public function Transactions(){
    $user_data = Auth::user();
    $user_id = $user_data->id;
   $card_orders = DB::table('order_card')->where('user_id',$user_id)->get();
    return view('user_panel.home',compact('card_orders'));
}

public function cards(){

    $data['products'] = DB::table('products')->offset(1)->limit(5)->get();
    $data['product_first'] = DB::table('products')->first();
    return view('user_panel.add_card.index',$data);
}

public function deposit(){
    $paymentMethod = DB::table('payment_method')->where('status',"1")->get();
     $buyCredit = Auth::user();
    return view('user_panel.deposit.index',compact('paymentMethod','buyCredit'));
}

public function savedeposit(Request $request){
    $user_dt = Auth::user();
    $data['user_id']=$user_dt->id;
    $data['name']=$user_dt->name;
    $data['email']=$user_dt->email;
    $data['contact_no']=$request->contact_no;
    $data['further_info']=$request->further_info;
    $data['payment_method_name']=$request->payment_method_name;
    $data['transaction_details']=$request->transaction_details;
    $data['amount']=$request->amount;
    $data['status']='0';
    $data['created_at']=date('Y-m-d H:i:s');
    $data['updated_at']=date('Y-m-d H:i:s');
    $deposit = DB::table('order_credit')->insert($data);

   if($deposit){
     session::put('success','Your manual deposit request has been Under Processing ');
     return Redirect::to('/deposit');
    }else{ 
      session::put('success','Balance deposit failed');
      return Redirect::to('/deposit');
    }
}

public function BalanceTransfer(Request $request){
    $user_dt = Auth::user();
    $login_email =$user_dt->email;
    $data['balance']=$request->amount;
    $amount =$request->amount;
    $email=$request->email;


    $check = DB::table('users')->where('email',$login_email)->first();
    
    if(!empty($check)){


    $existing_balance = $check->balance;

    if($existing_balance>$amount){
     $data['balance']=$existing_balance-$request->amount;  
     
    //  dd($data['balance']);
     $transfer1 = DB::table('users')->where('email',$login_email)->update($data);

     $check2 = DB::table('users')->where('email',$email)->first();

     $data2['balance']=$check2->balance+$request->amount;  
     
    //  dd($data2['balance']);
    //  exit();
     $transfer2 = DB::table('users')->where('email',$email)->update($data2);
     
     $data10['user_id']=$user_dt->id;
     $data10['payment_name']='Sent Money';
     $data10['email']=$login_email =$user_dt->email;
     $data10['amount']=$request->amount;
     $data10['status']='1';
     $data10['created_at']=date('Y-m-d H:i:s');
     $data10['updated_at']=date('Y-m-d H:i:s');
     
     $snet_another = DB::table('send_money')->insert($data10);

     session::put('success','Balance Transfer successfully');
     return Redirect::to('/load');
    }else{
      session::put('success','Balance Transfer failed');
      return Redirect::to('/load');  
    }
    
    }else{
        session::put('success','This user do not have any account');
       return Redirect::to('/load'); 
    }

}

public function Viewcards(){
    $user_dt = Auth::user();
    $cards = DB::table('userlist')->where('user_id',$user_dt->id)->where('status',1)->get();

   return view('user_panel.Viewcards.index',compact('cards')); 
}

public function ViewcardDetails(Request $request){
    
    $user_list_id = $request->idr;
    // $cards = DB::table('userlist')->where('id',$user_list_id)->where('status',1)->get();
    $user = Auth::user();
    $user_id = $user->id;
    
    

    // $cards = DB::table('userlist')
    //     ->join('products', 'userlist.card_id', '=', 'products.id')
    //     ->select('userlist.*', 'products.*')
    //     ->where('userlist.id', $user_list_id)
    //     ->where('userlist.user_id', $user_id)
    //     ->get();

    $cards = DB::table('userlist')
        ->leftJoin ('users','userlist.user_id','=','users.id')
        ->leftJoin ('products','userlist.card_id','=','products.id')
        ->select('userlist.created_at','userlist.user_id','userlist.user_name','userlist.user_email','userlist.card_name','userlist.card_code','userlist.card_id','userlist.validity','userlist.amount',
            'userlist.pin','userlist.cvv','userlist.status','products.image','products.product_name')
        ->where('userlist.status',1)->where('users.id',Auth::user()->id)->where('userlist.id',$user_list_id)
        ->get();

   return json_decode($cards);
}

public function userDeleteCard(Request $request){
    
    $user_list_id = $request->idr;
    $data['status']=2;
    $cards = DB::table('userlist')->where('id',$user_list_id)->update($data);

   
    echo "deleted";
     Mail::send(new DeletedCard());
     session::put('success','Credit deleted successfully');

    // }else{
    //   echo "failed";  
    //   session::put('success','Credit delete failed');
    // }
}

public function userCardStatement(Request $request){
    
    $card_id = $request->idr;
    $user1 = Auth::user();
    
    $card = DB::table('userlist')->where('card_id',$card_id)->where('user_id',$user1->id)->first();
    
    $data['user_id']=$user1->id;
    $data['name']=$user1->name;
    $data['email']=$user1->email;
    $data['cardholder_name']=$user1->name;
    $data['card_code']=$card->card_code;
    // $data['status']=$card->status;
    $data['status']=0;
    $data['created_at']=date('Y-m-d H:i:s');
    $data['updated_at']=date('Y-m-d H:i:s');
    
    $request_save = DB::table('card_statement_requests')->insert($data);
    
    if($request_save){
        echo "success";
        session::put('success','Card Statement Request successfully Sent');
    }
    else{
      echo "failed";  
      session::put('success','Card Statement Request failed');
    }
}

public function get_card_deta(Request $request){
    
    $product_id = $request->product_id;
    $price_load = $request->price_load;

    $load_price_vat = ($price_load*8)/100;
    $data['price_load'] = $price_load;

    $data['price_load_with_vat'] = $load_price_vat+$price_load;

    $data['cards'] = DB::table('userlist')->where('id',$product_id)->where('status',1)->get();

   return json_encode($data);
}

public function save_credit_order(Request $request){
    
    $card_id = $request->card_id;
    $price_load = $request->price_load;
    
    $user = Auth::user();

    $card_info = DB::table('userlist')->where('card_id',$card_id)->where('user_id',$user->id)->where('status',1)->first();
    
    $load_price_vat = $request->total_tk;
    
    $userd = DB::table('users')->where('id',$user->id)->first();
    
    if($userd->balance > $load_price_vat){
    
    $balance_now['balance'] = $userd->balance - $load_price_vat;

    $data['user_id']=$user->id;
    $data['name']=$user->name;
    $data['email']=$user->email;
    $data['cardholder_name']=$user->name;
    
    $data['card_code']=$card_info->card_code;
    $data['amount']=$price_load;
    $data['amount_with_vat']=$load_price_vat;
    $data['status']='0';
    $data['created_at']=date('Y-m-d H:i:s');
    $data['updated_at']=date('Y-m-d H:i:s');

    $order = DB::table('load_credit_requests')->insert($data);
   
    if($order){
     DB::table('users')->where('id',$user->id)->update($balance_now);
     session::put('success','Card deposit under processing');
    }else{
      session::put('success','Card deposit failed');
    }
    
    }else{
      session::put('success','Do not have enough balance. Credit order failed');
    }
}

public function card_details(Request $request){

    $product_id = $request->product_id;

    $product_details = DB::table('products')->where('id',$product_id)->first();

    $load_and_price_vat = ($request->price_load+$product_details->price)*7/100;

    $data['price_with_vat'] = $load_and_price_vat + $request->price_load+$product_details->price;

    $data['price_load'] = $request->price_load;
    $data['product_data'] = $product_details;

    return json_encode($data);
}

public function save_card_order(Request $request){

    $product_id = $request->card_id;
    $card = DB::table('products')->where('id',$product_id)->first();
    $total_tk = $request->total_tk;
    
    $user = Auth::user();

    $user_order = DB::table('userlist')->where('user_id',$user->id)->where('status',1)->count();

    $user_data = DB::table('users')->where('id',$user->id)->first();

    $user_balance = $user_data->balance;

    if($user_order<4 && $user_balance>$total_tk){

    $data['user_id']=$user->id;
    $data['card_id']=$product_id;
    $data['name']=$user->name;
    $data['email']=$user->email;
    $data['cardholder_name']=$user->name;
    $data['card_selected']=$card->product_name;
    $data['price']=$card->price;
    $data['amount_entered']=$request->price_load;
    $data['total']=$total_tk;
    $data['status']=0;
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');

    $order = DB::table('order_card')->insert($data);
   
    if($order){
     session::put('success','Card issue successful');
     $data2['balance'] = $user_data->balance - $total_tk;
     DB::table('users')->where('id',$user->id)->update($data2);
     
    }else{
      session::put('success','Card order failed');
    }
  }else if($user_balance<$total_tk){
    session::put('success','You do not have sufficient balance.');
  }
  else{
    session::put('success','You already have 3 Cards. Delete one to get another.');
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



    public function perfectMoneyStatus()
    {
            dd("status");
    }

    public function perfectMoneySuccess(Request $request)
    {

        $user_dt = Auth::user();
        $data['user_id']=$user_dt->id;
        $data['name']=$user_dt->name;
        $data['email']=$user_dt->email;
        $data['contact_no']=$request->contact_no;
        $data['further_info']=$request->further_info;
        $data['payment_method_name']=$request->payment_method_name;
        $data['transaction_details']=$request->transaction_details;
        $data['amount']=$request->perfect_amount;
        $data['status']='0';
        $data['created_at']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');
        DB::table('order_credit')->insert($data);

        session::put('success','Credit deleted successfully');
    }

    public function perfectMoneyError()
    {
        $hello= csrf_token();
        dd($hello);
    }
}
