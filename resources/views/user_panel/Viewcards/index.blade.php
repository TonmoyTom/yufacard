@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

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
   ul#ONE{
    float:right;
  }
  ul#ONE li{
    display:inline-block;
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

            <a href="{{url('deposit')}}"><button class="btn btn-success" style="min-width: 110px;max-width: 100%;width: auto;margin-right: 10px;background:transparent;color:#4CCEAC;text-transform: uppercase;font-size: 16px;" >Deposit</button></a>
      </li>
      <li>
         <a href="{{url('load')}}"><button style="min-width: 110px;max-width: 100%;width: auto;text-transform: uppercase;
    font-size: 16px;color:#fff;" class="btn btn-success"> Send</button></a>
      </li>
   </ul>
          <br/>
        
      </div>
      
    </div>

    <div class="row" style="margin-top:40px;">

      <div class="col-12" style="border:.5px solid #cccccc78;">
      </div>

    </div>
    
    <div class="row">

      <div class="col-12 py-5">
        <h4 style="text-align:center;">List Cards *</h4>
      </div>
    </div>


    <div class="row"> 

    @foreach($cards as $card)

    <div class="col-lg-4">

            <div class="card" id="card1" style="margin-bottom: 15px;border-radius: 8px;padding:23px; border: 1px solid #e5e9ed;
">
          <!-- <div class="card-header">
            <span>Virtual</span>
          </div> -->
          
   <div class="row">

      <div class="col-lg-3">
          <div style="margin-bottom: 5px;width: 72px;float:left; height: 18px;line-height: 18px;border-radius: 9px;padding: 0 12px;
    background-color:#b1f5e2;color: #676767;
    float: left;text-transform: uppercase;font-size: 9px;letter-spacing: 1px;font-weight: 700;">
            <span class="text-left">Active</span> 
          </div>
  </div>

  <div class="col-lg-3">
          <div style="width: 72px;float:left;  height: 18px;line-height: 18px;border-radius: 9px;padding: 0 12px;
    background-color: #cfebef;color: #676767;
    float: left;text-transform: uppercase;font-size: 9px;letter-spacing: 1px;font-weight: 700;">
     <span class="text-left" style="cursor: pointer;" onclick="deleteCard(<?php echo $card->id; ?>)" >Delete</span>
          </div>
    </div>

    <div class="col-lg-6">
    </div>

  </div>

      <div class="card-body">
        <h5 data-toggle="modal" onclick="ViewCard(<?php echo $card->id; ?>)" data-target="#exampleModalCenter" class="card-title text-center" style="cursor: pointer;margin:12px 0px;font-size: 17px;color:#1a1afb;text-transform:capitalize;">

        <i class="mdi mdi-eye eye-icon"></i>

        Show Card</h5>
        
        <h5 onclick="request_statement(<?php echo $card->card_id; ?>)" class="card-title text-center" style="margin: 12px 0px;font-size: 14px;color: green;padding: 2px 0px 4px 0px;text-transform: capitalize;border: 1px solid #000;cursor: pointer;">

        Request Card Statement</h5><br/>
        
        
        
        <div>
            
            <p><span style="text-transform: capitalize;color:#000;font-weight:bold;"><?php echo $card->card_name; ?></span>
              <!--<span onclick="deleteCard(<?php echo $card->id; ?>)" style="float:right;color:#ff9b1e;font-weight:bold;">Delete Cart</span>-->
              </p>
        </div>
      </div>


          <!-- <div class="card-footer text-muted">
            2 days ago
          </div> -->
        </div>
    

    </div>
    
   @endforeach

        
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

<!-- modal data start here -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="float:right;">&times;</span>
        </button>

        <div class="modal-header" style="border:none !important;padding:0px;">


        
        </div>
        <div class="modal-body">

          <form method="post">
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <center><div id="card_img" style="width: 100%;
    height: 264px;background-repeat: no-repeat;background-position: center;position:relative;">
    <div style="position: absolute;text-align: left;bottom: 20px;
    left: 44px;
    color: white;">
      <p style="font-size: 16px;
    font-weight: 700;
    text-shadow: 0 1px 2px rgb(0 0 0 / 20%);font-weight:bold;">
    
    <span class="card_no1"><input readonly style="font-size: 18px;
    font-weight: 700;
    text-shadow: 0 1px 2px rgb(0 0 0 / 20%);
    border: none;
    color: #fff;
    background: transparent;
    font-weight: bold;" type="text" id="card_nmbr" name="crdn"></span> <span onclick='cardno_copy()'><i class="mdi mdi-content-copy"></i></span>
    </p>
      <p>
        <span class="card_validity" style="font-size: 16px;
    color: #e6e6e6;
    text-shadow: 0 1px 2px rgb(0 0 0 / 20%);"></span>
        <span style="font-size: 16px;
    color: #e6e6e6;
    text-shadow: 0 1px 2px rgb(0 0 0 / 20%);">
        &nbsp; &nbsp; CVV :<span style="font-size: 16px;
    color: #e6e6e6;
    text-shadow: 0 1px 2px rgb(0 0 0 / 20%);" class="card_cvv"></span>
        </span>
        
      </p>
      <p class="card_name" style="font-weight:bold;text-transform: font-size: 20px;
    color: #e6e6e6;
    text-shadow: 0 1px 2px rgb(0 0 0 / 20%);"></p>
    </div>

    </div>
  </center>
            <ul>
                <li>Card TopUp Fees <span class="card_price" style="float:right;padding-right:5px;">5%</span>
                  <input type="hidden" id="card_id" name="card_id">
                </li>

                <li>Service Fees <span style="float:right;padding-right:5px;">3%</span></li>

            </ul>

            <div style="border-bottom: 1px solid #ccc;">
            </div>

            <ul>
                <li>Total Amount <span class="price_total" style="float:right;padding-right:5px;">00</span>
                  <input type="hidden" id="total_tk" name="total_tk">
                  <input type="hidden" id="price_load" name="price_load">
                </li>

          </ul>


   <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">$</span>
      
      <input type="text" class="form-control" placeholder="Enter Amount TopUp Your Card" onkeyup="getProduct(this)" name="online_card" id="online_card" aria-label="Username" aria-describedby="basic-addon1">

    </div>
               
  <button type="button" onclick="save_credit_order()" style="width: 100%;
    text-transform: uppercase;" class="btn btn-success" role="button"><span class="Button__Content"><span>Confirm</span></span></button>

    </form>    

  </div>
        
      
    </div>
  </div>
</div>







<script type="text/javascript">
function cardno_copy() {
  var copyText = document.getElementById("card_nmbr");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
}

function ViewCard(id){
    var datastr="idr="+id;
    var cell = $('#card_img');
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'view-card-details?'+datastr, 
type: "get",
dataType: "json",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    console.log(data);  
    // console.log(data[0].id); 
    $('#card_id').val(data[0].card_id); 
    $('#card_nmbr').val(data[0].card_code); 
    $('.card_no').html(data[0].card_code); 
    $('.card_validity').html(data[0].validity); 
    $('.card_cvv').html(data[0].cvv); 
    $('.card_name').html(data[0].card_name); 
    // $cell.css("background-image", "url('http://localhost:8001/" + data[0].image + "')");
    jQuery("#card_img").css('background-image', 'url(' + data[0].image + ')');
    // card_id
}
});

} 

function deleteCard(id){
  var datastr="idr="+id;
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'user-delete-card?'+datastr, 
type: "get",
dataType: "html",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    console.log(data); 
    location.href = "https://yufacard.com/view-cards";
    
}
});

} 

function request_statement(id){
  var datastr="idr="+id;
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'request-card-statement?'+datastr, 
type: "get",
dataType: "html",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    console.log(data); 
    location.href = "https://yufacard.com/view-cards";
    
}
});

} 


$('#c_status').click(function(){
var status =$('#c_status').val().trim();
if(status=='1'){
        $("#c_status").attr('checked', false);
        $("#c_status").val('0');
    }else if(status=='0'){
$("#c_status").val('1');
    }
});

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    function two(elm){
      $('.test').removeClass('activet');
      $(elm).addClass("activet");
    }

function getProduct(elm){
  // card_id
  var product_id = $('#card_id').val();
  var price_load = elm.value;

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'get_card_deta', 
type: "get",
dataType: "json",
data: 'product_id='+product_id+'&price_load='+price_load,
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
  
    $('#total_tk').val(data.price_load_with_vat);
    $('#price_load').val(data.price_load);
    $('.price_total').html(data.price_load_with_vat);
    // $('.modal-content').html(data);
    // $('#total_tk').val(data.price_with_vat);
    // $('#price_load').val(data.price_load);
    // $('#card_id').val(data.product_data.id);   
}
});
    }

function save_credit_order(elm,pro_id){
  var total_tk = $('#total_tk').val();
  var card_id = $('#card_id').val();
  var price_load = $('#price_load').val();
//   alert(price_load);
//   exit();
  
  var data = new FormData();
  data.append('total_tk', total_tk);
  data.append('card_id', card_id);
  data.append('price_load', price_load);


  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'save_credit_order', 
type: "post",
dataType: "html",
data: data,
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
      // console.log(data);   
    // $('#exampleModalCenter').modal('hide');
   location.href = "https://yufacard.com/view-cards";
}
});
    }
</script>

@endsection

