@extends('layouts.app')


@section('content')


<style type="text/css">
  /*#example_wrapper{
    width:100%;
    padding:0% 2%;
  }
  .page-body .page-content-wrapper{
    padding: 10px 10px;
  }*/
  #card1:hover {
    border: 1px solid rgba(255, 155, 30, 0.3) !important;
  }
  .activet{
    border-bottom: 3px solid #ff9b1e;
    color: #ff9b1e;
  }
  ul.nav.nav-tabs li{
    padding: 0px 20px 9px 0px;
  }
  
 ul#ONE{
    float:right;
  }
  ul#ONE li{
    display:inline-block;
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

      <div class="col-md-12">

          
      <ul id="ONE">
          <li>

            <a href="{{url('deposit')}}"><button class="btn btn-success" style="min-width: 110px;max-width: 100%;width: auto;margin-right: 10px;background:transparent;color:#4CCEAC;text-transform: uppercase;font-size: 16px;" >Deposit</button>
      </li>
      <li>
         <a href="{{url('load')}}"> <button style="min-width: 110px;max-width: 100%;width: auto;text-transform: uppercase;
    font-size: 16px;color:#fff;" class="btn btn-success">Send</button> </a>
      </li>
   </ul>
          <br/>
        
      </div>
      
    </div>

    <div class="row" style="margin-top:40px;">

      <div class="col-12" style="border:.5px solid #cccccc78;">
      </div>

    </div>

    <div class="row-fluid">
      <br/>
      
      <div class="container">
  
      <ul class="nav nav-tabs">
        
        <li class="active test activet" onclick="two(this);"><a data-toggle="tab" style="color: #505050;" href="#menu1">Send to Friends</a></li>
        
        <li class="active test" onclick="two(this);"><a data-toggle="tab" href="#home5" style="color: #505050;"><img style="height: 38px;" src="{{asset('public/img/SEPA.png')}}"></a></li>

        <li class="active test" onclick="two(this);"><a data-toggle="tab" href="#home" style="color: #505050;"><img style="height: 38px;" src="{{asset('public/img/BITCOIN.png')}}"></a></li>
        
           <li class="active test" onclick="two(this);"><a data-toggle="tab" href="#home2" style="color: #505050;"><img style="height: 38px;" src="{{asset('public/img/SKRILL.png')}}"></a></li>
           
           <li class="active test" onclick="two(this);"><a data-toggle="tab" href="#home3" style="color: #505050;"><img style="height: 38px;" src="{{asset('public/img/NETELLER.png')}}"></a></li>
           
           <li class="active test" onclick="two(this);"><a data-toggle="tab" href="#home4" style="color: #505050;"><img style="height: 38px;" src="{{asset('public/img/PERFECT MONEY.png')}}"></a></li>
      </ul>

  <div class="tab-content">
      
    <div id="home" class="tab-pane fade">
        
      <div style=" margin: auto;width:60%;">
      <br/><h2>Send Bitcoin</h2>
      <br/>
      <div class="form-group">
        <form method="post" action="{{url('save-send-money')}}">
          @csrf
        <input type="text" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="Enter Bitcoin Address" name="email">
    
    <input type="hidden" value="Bitcoin" class="form-control" placeholder="" name="money">
      </div>

      <div class="form-group">
        <input type="text" name="amount" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="Amount USD">
        
      </div>

      <div class="form-group">
        <!-- <button type="submit" style="padding: 20px 12px 10px 12px;height: 60px;background: #696ffb;" > -->
        <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
    color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Submit</span></button>
        </form>
      </div><!-- /input-group -->

      </div>
      
    </div>
    
    <div id="home2" class="tab-pane fade">
        
      <div style=" margin: auto;width:60%;">
      <br/><h2>Send Skrill</h2>
      <br/>
      <div class="form-group">
        <form method="post" action="{{url('save-send-money')}}">
          @csrf
        <input type="email" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="Enter Skrill Email" name="email">
    
    <input type="hidden" value="Skrill" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="Skrill" name="money">
      </div>

      <div class="form-group">
        <input type="text" name="amount" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="Amount USD">
        
      </div>

      <div class="form-group">
        <!-- <button type="submit" style="padding: 20px 12px 10px 12px;height: 60px;background: #696ffb;" > -->
        <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
    color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Submit</span></button>
        </form>
      </div><!-- /input-group -->

      </div>
      
    </div>
    
    <div id="home3" class="tab-pane fade">
        
      <div style=" margin: auto;width:60%;">
      <br/><h2>Send NETELLER</h2>
      <br/>
      <div class="form-group">
        <form method="post" action="{{url('save-send-money')}}">
          @csrf
        <input type="email" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="Enter Neteller Email" name="email">
    
        <input type="hidden" value="Neteller" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="NETELLER" name="money">
    
      </div>

      <div class="form-group">
        <input type="text" name="amount" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="Amount USD">
        
      </div>

      <div class="form-group">
        <!-- <button type="submit" style="padding: 20px 12px 10px 12px;height: 60px;background: #696ffb;" > -->
        <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
    color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Submit</span></button>
        </form>
      </div><!-- /input-group -->

      </div>
      
    </div>
    
    <div id="home4" class="tab-pane fade">
        
      <div style=" margin: auto;width:60%;">
      <br/><h2>Send Perfect Money</h2>
      <br/>
      <div class="form-group">
        <form method="post" action="{{url('save-send-money')}}">
          @csrf
        <input type="text" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="Enter User ID" name="email">
    
        <input type="hidden" value="Perfect Money" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="Perfect Money" name="money">
    
      </div>

      <div class="form-group">
        <input type="text" name="amount" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="Amount USD">
        
      </div>

      <div class="form-group">
        <!-- <button type="submit" style="padding: 20px 12px 10px 12px;height: 60px;background: #696ffb;" > -->
        <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
    color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Submit</span></button>
        </form>
      </div><!-- /input-group -->

      </div>
      
    </div>
    
    <div id="home5" class="tab-pane fade">
        
      <div style=" margin: auto;width:60%;">
      <br/><h2>SEPA Payment</h2>
      <br/>
      <div class="form-group">
        <form method="post" action="{{url('save-send-money')}}">
          @csrf
          
        <input type="hidden" class="form-control" required="" style="color: rgb(178 184 189);border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" value="SEPA" placeholder="SEPA" name="money">  
    
       <input type="text" name="iban" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="IBAN">
          
      </div>

      <div class="form-group">
        <input type="text" name="beneficiary" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="Beneficiary Name Surname">
        
      </div>
      
      <div class="form-group">
        <input type="text" name="bic" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="BIC">
        
      </div>
      
      <div class="form-group">
        <input type="text" name="amount" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="Amount">
      </div>

      <div class="form-group">
        <!-- <button type="submit" style="padding: 20px 12px 10px 12px;height: 60px;background: #696ffb;" > -->
        <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
    color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Submit</span></button>
        </form>
      </div><!-- /input-group -->

      </div>

    </div>
    
    <div id="menu1" class="tab-pane fade in active show">
        
      <div style=" margin: auto;width:60%;">
      <br/><h2>Send Money Friends Free</h2>
      <br/>
      <div class="form-group">
        <form method="post" action="{{url('balance-transfer')}}">
          @csrf
        <input type="email" class="form-control" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;
    height:48px;background: aliceblue;" placeholder="User Email" name="email">
      </div>

      <div class="form-group">
        <input type="text" name="amount" required="" style="border: 1px solid #ccc;padding: 20px 12px 10px 12px;height:48px;background: aliceblue;" class="form-control" placeholder="Amount USD">
        
      </div>

      <div class="form-group">
        <!-- <button type="submit" style="padding: 20px 12px 10px 12px;height: 60px;background: #696ffb;" > -->
        <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
    color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Submit</span></button>
        </form>
      </div><!-- /input-group -->

      </div>

    </div>

    
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
  function two(elm){
      $('.test').removeClass('activet');
      $(elm).addClass("activet");
    }
</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61657210157d100a41ac0230/1fhq4b512';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
