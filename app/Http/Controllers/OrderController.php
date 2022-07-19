<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Mail;
use Response;
use App\Mail\ConfirmCreditOrder;
use App\Mail\WidthdrawSuccess;
// use App\mail\CardOrderSuccess;
use App\Mail\CardOrderSuccess;

class OrderController extends Controller
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
       $orders = DB::table('order_card')->orderBy('id', 'desc')->get();
      return view('admin.card_orders.index',compact('orders'));
    }

    public function addStatement($id)
    {
       $data['user'] = DB::table('card_statement_requests')->where('id',$id)->first();

       $data['statements'] = DB::table('statement')->where('user_id',$data['user']->user_id)->get();
       
      return view('admin.statement.create',$data);
    }

    public function saveStatement(Request $request){
      $counter = count($request->transaction_date);
     $user_id = $request->user;
     $name = $request->name;
     $email = $request->email;
     $cardholder_name = $request->cardholder_name;
     $card_code = $request->card_code;

      for($i=0; $i < $counter; $i++){
        $data['user_id']=$user_id;
        $data['name']=$name;
        $data['email']=$email;
        $data['cardholder_name']=$cardholder_name;
        $data['card_code']=$card_code;
        $data['transaction_date']=$request->transaction_date[$i];
        $data['transaction_type']=$request->transaction_type[$i];
        $data['status']=$request->status[$i];
        $data['credit_debit']=$request->credit_debit[$i];
        $data['note']=$request->note[$i];
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $insert = DB::table('statement')->insert($data);
      }

      Session::put('saveStatement','Statement saved successfully');

      return Redirect::back();

    }

    public function updateStatement(Request $request){
      
     $id = $request->id;

     $data['user_id']=$request->user_id;
     $data['transaction_date']=$request->transaction_date;
     $data['transaction_type']=$request->transaction_type;
     $data['status']=$request->status;

     $data['credit_debit']=$request->credit_debit;

     $data['note']=$request->note;

     $update = DB::table('statement')->where('id',$id)->update($data);

     if($update==1){

        Session::put('updateStatement','Statement updated successfully');

       return Redirect::back();

     }else{

      Session::put('updateStatement','Statement updated failed');

       return Redirect::back();

     }

    }

    public function deleteStatement(Request $request){
     $id = $request->idr;
     $update = DB::table('statement')->where('id',$id)->delete();

     Session::put('deleteStatement','Statement deleted successfully');

    }

    public function viewCreditOrders()
    {
       $orders = DB::table('order_credit')->get();
      return view('admin.credit_order.index',compact('orders'));
    }

    public function viewDeleteCardRequests()
    {
       // $delete_requests = DB::table('userlist')->where('status',2)->get();

       $delete_requests = DB::table('userlist')
            ->join('users', 'userlist.user_id', '=', 'users.id')
            ->join('products', 'userlist.card_id', '=', 'products.id')
            ->select('*')
            ->where('userlist.status',2)
            ->get();

      return view('admin.delete_card_requests.index',compact('delete_requests'));
    }

    public function DeleteCardRequests($id)
    {
       $delete_requests = DB::table('delete_card_requests')->where('id',$id)->delete();

      if($delete_requests=='1'){
      Session::put('deleteCardRequest','Card request deleted successfully');

      return Redirect::to('/view-delete-card-requests');
      }
    }

    public function viewWithdrawRequests(){
      $orders = DB::table('withdraw_requests')->get();
      return view('admin.withdraw_requests.index',compact('orders'));
    }

    public function viewLoadCreditRequests(){
      $orders = DB::table('load_credit_requests')->get();
      return view('admin.load_credit_requests.index',compact('orders'));
    }

    public function viewCardStatementRequests(){
      $orders = DB::table('card_statement_requests')->get();
      return view('admin.card_statement_requests.index',compact('orders'));
    }

    public function updateWithdrawRequests(Request $request){

       $idd=$request->idd;
       $status = $request->status;
       
       if(empty($status)){
        $status='0';
       }
       $data['status']=$status;

      $db = DB::table('withdraw_requests')->where('id',$idd)->update($data);
       if($status==1){
        echo "Order Confirmed Successfully";
      }else{
        echo "Order Cancled Successfully";
      }
    }

    public function updateLoadCreditRequests(Request $request){

       $idd=$request->idd;
       $status = $request->status;
       $us_mail = $request->us_mail;
       
       if(empty($status)){
        $status='0';
       }
       $data['status']=$status;
       $data['updated_at']=date('Y-m-d H:i:s');

      $db = DB::table('load_credit_requests')->where('id',$idd)->update($data);
       if($status==1){
           
          Mail::send(new WidthdrawSuccess()); 
          
        echo "Order Confirmed Successfully";
      }else{
        echo "Order Cancled Successfully";
      }
    }

    public function updateCardStatementRequest(Request $request){

       $idd=$request->idd;
       $status = $request->status;
       
       if(empty($status)){
        $status='0';
       }
       $data['status']=$status;

      $db = DB::table('card_statement_requests')->where('id',$idd)->update($data);
       if($status==1){
        echo "Card Statement Confirmed Successfully";
      }else{
        echo "Card Statement Cancled Successfully";
      }
    }

    public function deleteWithdrawRequests($id){

      $db = DB::table('withdraw_requests')->where('id',$id)->delete();

      if($db=='1'){
      Session::put('deleteWithdrawRequests','withdraw requests deleted successfully');

      return Redirect::to('/view-withdraw-requests');
      }

    }

    public function deleteLoadCreditRequests($id){

      $db = DB::table('load_credit_requests')->where('id',$id)->delete();

      if($db=='1'){
      Session::put('load_credit_requests','Load Credit Requests deleted successfully');

      return Redirect::to('/view-load-credit-requests');
      }

    }

    public function deleteCardStatemen($id){

      $db = DB::table('card_statement_requests')->where('id',$id)->delete();

      if($db=='1'){
      Session::put('load_credit_requests','Card Statement deleted successfully');

      return Redirect::to('/view-card-statement-requests');
      }

    }

    public function editCreditOrders($id)
    {
       $datas = DB::table('order_credit')->where('id',$id)->first();

      return view('admin.credit_order.edit',compact('datas'));
    }

    public function AdminCreditAdd($id)
    {
       $datas = DB::table('users')->where('id',$id)->get();
      return view('admin.credit_order.add_credit',compact('datas'));
    }

    public function AdminUpdateCredit(Request $request)
    {
      $id= $request->id;
      $data['balance']=$request->balance;
      $data['country']=$request->country;
      $datas = DB::table('users')->where('id',$id)->update($data);
      
      if($datas=='1'){
      Session::put('updateCredit','Credit Added!');

      return Redirect::to('/view-credit-orders');
      }

    }

    public function editWithdrawRequests(Request $request){
       $data = DB::table('withdraw_requests')->where('id',$request->idr)->first();

       return json_encode($data);
    }

    public function editLoadCreditRequests(Request $request){
       $data = DB::table('load_credit_requests')->where('id',$request->idr)->first();

       return json_encode($data);
    }

    public function editCardStatementRequests(Request $request){
       $data = DB::table('card_statement_requests')->where('id',$request->idr)->first();

       return json_encode($data);
    }

    public function updateCreditOrder(Request $request)
    {
       $data['name']=$request->name;
       $data['user_id']=$request->user_id;
       $data['email']=$request->email;
       $data['payment_method_name']=$request->payment_method_name;
       $data['transaction_details']=$request->transaction_details;
       $data['amount']=$request->amount;
       $data['created_at']=date('Y-m-d H:i:s');;
       $data['updated_at']=date('Y-m-d H:i:s');;
       $status=$request->status;

       if(empty($status)){
            $status =0;
        }

       $data['status']=$status;
       $id=$request->id;
       
       $orders = DB::table('order_credit')->where('id',$id)->update($data);
       
       // Mail::send(new ConfirmCreditOrder());
       
       if($orders){
          
          Mail::send(new ConfirmCreditOrder());

          Session::put('updateCredit','Confirm Credit Order Successfully');

         return Redirect::to('/view-credit-orders');
       }else{
          Session::put('updateCredit','Confirm Credit Order failed');

         return Redirect::to('/view-credit-orders');
       }

    }

    public function deleteCreditOrders($id)
    {
       DB::table('order_credit')->where('id',$id)->delete();

      Session::put('deleteCard','Credit Order Deleted Successfully');
      return Redirect::to('/view-credit-orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
        $datas = DB::table('order_card')->where('id',$id)->first();
        return view('admin.card_orders.edit',compact('datas'));
    }

    public function AdminAddCard($id)
    {    
        $datas = DB::table('order_card')->where('id',$id)->first();
        return view('admin.card_orders.add_card',compact('datas'));
    }

    public function AdminSaveCard(Request $request){
       $data['user_id'] = $request->user_id;
       $data['card_id'] = $request->card_id;
       $data['user_name'] = $request->name;
       $data['user_email'] = $request->email;
       $data['card_name'] = $request->cardholder_name;
       $data['description'] = $request->note;
       $data['card_code'] = $request->card_code;
       $data['validity'] = $request->validity;
       $data['amount'] = $request->amount;
       $data['pin'] = '0';
       $data['cvv'] = $request->cvv;
       $data['status'] = $request->status;
       $data['created_at']=date('Y-m-d H:i:s');
       $data['updated_at']=date('Y-m-d H:i:s');

       $save = DB::table('userlist')->insert($data);
      if($save==1){
      
        return Redirect::back()->with('success', 'Card added to user successfully');

      }else{
    
        return Redirect::back()->with('Card failed to add user');
      }

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
      $data['user_id']=$request->user_id;
      $data['name']=$request->name;
      $data['email']=$request->email;
      $data['cardholder_name']=$request->cardholder_name;
      $data['card_selected']=$request->card_selected;
      $data['amount_entered']=$request->amount_entered;
      $data['total']=$request->total;
      $status =$request->status;
      
      if(empty($status)){
            $status =0;
        }
      $data['status']=$status;

      $id = $request->id;

      $orders = DB::table('order_card')->where('id',$id)->update($data);


      if($orders){
                
        Mail::send(new CardOrderSuccess());

        Session::put('updateCard','Confirm Card Order Successfully');
        return Redirect::to('/view-card-orders');

      }else{
        Session::put('updateCard','Confirm Card Order failed');
        return Redirect::to('/view-card-orders');
      }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table('order_card')->where('id',$id)->delete();

      Session::put('deleteCard','Card deleted Success');
      return Redirect::to('/view-card-orders');
    }
}
