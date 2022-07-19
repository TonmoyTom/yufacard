@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<style type="text/css">
  #example_wrapper{
    width:100%;
    padding:0% 2%;
  }
  .page-body .page-content-wrapper{
    padding: 10px 10px;
  }
  #card1:hover {
    border: 1px solid rgba(255, 155, 30, 0.3) !important;
  }
  .activet{
    border-bottom: 3px solid #ff9b1e;
    color: #ff9b1e;
  }
  

</style>

<!-- <a class="btn btn-success" data-toggle="modal" onclick="editOrder()" data-target="#exampleModalCenter">
  Confirm Order
</a> -->

<div class="page-content-wrapper-inner">
  
<?php
    $message = Session::get('success');
    if($message){
?>
<h4 class="alert alert-success">
    <?php
        echo $message;
        Session::put('success','');
    ?>
</h4>
<?php } ?>


<?php
    $message2 = Session::get('load_credit_requests');
    if($message2){
?>

<h4 class="alert alert-success">
    <?php
        echo $message2;
        Session::put('load_credit_requests','');
    ?>
</h4>

<?php } ?>



  <div class="content-viewport">

  <div class="row">
    <div class="col-6">
      </div>

      <div class="col-6">

          

          <button style="text-transform: uppercase;
    font-size: 16px;color:#fff;min-width: 160px;max-width: 100%;width: auto;float:right;" class="btn btn-success">Send</button>

    <button class="btn btn-success" style="margin-right: 15px;background:transparent;color:#4CCEAC;text-transform: uppercase;font-size: 16px; min-width: 160px;max-width: 100%;width: auto;float:right;" >Load</button>

          <br/>
        
      </div>
      
    </div>

    <div class="row" style="margin-top:40px;">

      <div class="col-12" style="border:.5px solid #cccccc78;">
      </div>

    </div>

    <div class="row-fluid">
      <br/>
      <div class="span12" style="padding-left: 100px;">
          <span style="float:left; padding-top: 40px;"> Manual Method: </span>

          <!-- <span style="float:left; padding-top: 40px;"><img alt="" width="20" src="{{ url('images/backend_images/green.svg')}}"> Manual Method: </span> -->
          <div class="col-md-8" style="float:left; padding-left: 20px;">
              <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('PerfectMoney');" id="perfectmoney" width="150" src="{{ url('card/perfectMoney.svg')}}">
              <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Neteller');" id="neteller" width="150" src="{{ url('card/neteller.svg')}}">
              <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Skrill');" id="skrill" width="150" src="{{ url('card/skrill.svg')}}">
              <img style="border: 2px solid #CDCDCD;" onclick="toogleClick('Payoneer');" id="payoneer" width="150" src="{{ url('card/payoneer.svg')}}">
          </div>
      </div>

  </div>
  
  <div class="row" style="overflow:hidden;clear: both;">
    <div class="col-6">

    <div id="PerfectMoney" style="display:none;">
      <form action="http://localhost:8000/save-product" name="buy_credit" id="buy_credit" method="post">

        @csrf

      <input type="hidden" name="user_id" id="user_id" value="3626">
      <input type="hidden" name="name" id="name" value="Naz">
      <input type="hidden" name="email" id="email" value="nazmulhaqued@gmail.com">
      <input type="hidden" id="method-name" name="payment_method_name" value="Perfect Money">
      <br>

    <div class="form-group">
      <label for="inputCard">Send Money to:</label>
      <input type="text" required="" class="form-control" value="U21645562" disabled="" name="send_money" id="send-money">
    </div>

    <div class="form-group">
      <label for="inputDescription">Enter Amount:</label>
      <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount">
    </div>

    <div class="form-group">
      <label for="inputDescription">Transaction Details:</label>

      <input type="text" class="form-control" name="transaction_details" id="transaction_details" placeholder="Enter your Transaction details">
    </div>

    <p style="color:red;">Note: After payment you can knock us in live chat or Email: support@virtualcardasia.com
          <br>We will add credit within 1-2 hours</p>
    <br/>
    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      
   </form>

    </div>



    <div id="Neteller" style="display:none;">

      <form action="http://localhost:8000/save-product" name="buy_credit" id="buy_credit" method="post">

        @csrf

      <input type="hidden" name="user_id" id="user_id" value="3626">
      <input type="hidden" name="name" id="name" value="Naz">
      <input type="hidden" name="email" id="email" value="nazmulhaqued@gmail.com">
      <input type="hidden" id="method-name" name="payment_method_name" value="Perfect Money">
      <br>

    <div class="form-group">
      <label for="inputCard">Send Money to:</label>
      <input type="text" required="" class="form-control" value="bill-neteller@inbox.eu" disabled="" name="send_money" id="send-money">
    </div>

    <div class="form-group">
      <label for="inputDescription">Enter Amount:</label>
      <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount">
    </div>

    <div class="form-group">
      <label for="inputDescription">Transaction Details:</label>

      <input type="text" class="form-control" name="transaction_details" id="transaction_details" placeholder="Enter your Transaction details">
    </div>

    <p style="color:red;">Note: After payment you can knock us in live chat or Email: support@virtualcardasia.com
          <br>We will add credit within 1-2 hours</p>
    <br/>
    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      
   </form>

    </div>


    <div id="Skrill" style="display:none;">

      <form action="http://localhost:8000/save-product" name="buy_credit" id="buy_credit" method="post">

        @csrf

      <input type="hidden" name="user_id" id="user_id" value="3626">
      <input type="hidden" name="name" id="name" value="Naz">
      <input type="hidden" name="email" id="email" value="nazmulhaqued@gmail.com">
      <input type="hidden" id="method-name" name="payment_method_name" value="Perfect Money">
      <br>

    <div class="form-group">
      <label for="inputCard">Send Money to:</label>
      <input type="text" required="" class="form-control" value="bill-skrill@inbox.eu" disabled="" name="send_money" id="send-money">
    </div>

    <div class="form-group">
      <label for="inputDescription">Enter Amount:</label>
      <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount">
    </div>

    <div class="form-group">
      <label for="inputDescription">Transaction Details:</label>

      <input type="text" class="form-control" name="transaction_details" id="transaction_details" placeholder="Enter your Transaction details">
    </div>

    <p style="color:red;">Note: After payment you can knock us in live chat or Email: support@virtualcardasia.com
          <br>We will add credit within 1-2 hours</p>
    <br/>
    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      
   </form>

    </div>


    <div id="Payoneer" style="display:none;">

      <form action="http://localhost:8000/save-product" name="buy_credit" id="buy_credit" method="post">

        @csrf

      <input type="hidden" name="user_id" id="user_id" value="3626">
      <input type="hidden" name="name" id="name" value="Naz">
      <input type="hidden" name="email" id="email" value="nazmulhaqued@gmail.com">
      <input type="hidden" id="method-name" name="payment_method_name" value="Perfect Money">
      <br>

    <div class="form-group">
      <label for="inputCard">Send Money to:</label>
      <input type="text" required="" class="form-control" value="payoneer@briskcard.com" disabled="" name="send_money" id="send-money">
    </div>

    <div class="form-group">
      <label for="inputDescription">Enter Amount:</label>
      <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount">
    </div>

    <div class="form-group">
      <label for="inputDescription">Transaction Details:</label>

      <input type="text" class="form-control" name="transaction_details" id="transaction_details" placeholder="Enter your Transaction details">
    </div>

    <p style="color:red;">Note: After payment you can knock us in live chat or Email: support@virtualcardasia.com
          <br>We will add credit within 1-2 hours</p>
    <br/>
    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
      
   </form>

    </div>




    </div>

    
  </div>



    
  </div>
</div>

<style type="text/css">
    /*.active{
        border-bottom: 3px solid #ff9b1e;
    color: #ff9b1e;
    transition: color 0.2s ease, border-bottom-color 0.2s ease;
     }*/
</style>



@endsection

<script type="text/javascript">
    function toogleClick(elm){
  alert(elm);
  var id22 = '#'+elm;
  $(id22).toggle();
    }  
</script>

