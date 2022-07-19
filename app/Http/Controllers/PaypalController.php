<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use DB;
use Auth;

class PaypalController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::to('/deposit');             
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::to('/deposit');             
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
        return Redirect::to('/deposit');
    }

    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::to('/deposit');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {  
            
            $user_dt = Auth::user();
            $data['user_id']=$user_dt->id;
            $data['name']=$user_dt->name;
            $data['email']=$result->payer->payer_info->email;
            $data['contact_no']='';
            $data['further_info']='';
            $data['payment_method_name']=$result->payer->payment_method;
            $data['transaction_details']='';
            $data['amount']=$result->transactions[0]->amount->total;
            $data['status']='1';
            $data['created_at']=date('Y-m-d H:i:s');
            $data['updated_at']=date('Y-m-d H:i:s');
            $deposit = DB::table('order_credit')->insert($data);
            
            $usr = DB::table('users')->where('id',$user_dt->id)->first();
            
            $bl['balance']=$usr->balance + $result->transactions[0]->amount->total;
            DB::table('users')->where('id',$user_dt->id)->update($bl);
            
            \Session::put('success','Payment success !!');
            return Redirect::to('/payments');
        }

        \Session::put('success','Payment failed !!');
        return Redirect::to('/deposit');
    }
}
