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
  #exampleModalCenter > div > div > div.modal-body > form > ul.nav.nav-tabs > li.activet.test > a{
    color: #ff9b1e !important;
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
    font-size: 16px;color:#fff;" class="btn btn-success">Send</button></a>
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
        <h4 style="text-align:center;">Issue Cards *</h4>
      </div>
    </div>


    <div class="row">   

    <div class="col-lg-4">


        <div data-toggle="modal" onclick="editOrder()" data-target="#exampleModalCenter" class="card" id="card1" style="border-radius: 8px;padding:20px; border: 1px solid #e5e9ed;
">
          <!-- <div class="card-header">
            <span>Virtual</span>
          </div> -->
          <div style="width: 72px;height: 18px;line-height: 18px;border-radius: 9px;padding: 0 12px;
    background-color: #cfebef;color: #676767;
    float: left;text-transform: uppercase;font-size: 9px;letter-spacing: 1px;font-weight: 700;">
            <span class="text-left">Virtual</span>
          </div>

          <div class="card-body">
            <h5 class="card-title text-center" style="margin:12px 0px;color:#ea8200;text-transform:uppercase;">Create new card</h5><br/>
            <div>
                <p>****&nbsp;****&nbsp;****&nbsp;****</p>
                <p>EX 00/00</p>
                <p style="text-transform: capitalize;color:#000;font-weight:bold;">CARD HOLDER NAME</p>
            </div>
          </div>
          <!-- <div class="card-footer text-muted">
            2 days ago
          </div> -->
        </div>
    

    </div>

    <div class="col-lg-4">

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
    
            <center><div id="card_img" style="background-image:url('<?php echo $product_first->image; ?>');  width: 100%;
    height: 264px;background-repeat: no-repeat;background-position: center;position:relative;">
      <div style="position: absolute;text-align: left;bottom: 20px;
      left: 44px;
      color: white;">
        <p style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5368 98** **** ****</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;03/25</p>
        <p style="font-weight:bold;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Name</p>
      </div>

      </div>
    </center>
            <ul>
                <li>Card Issue Fees <span class="card_price" style="float:right;padding-right:5px;">0</span>
                  <input type="hidden" id="card_id" name="card_id">
                </li>

                <li> Founding Fees <span style="float:right;padding-right:5px;">5%</span></li>

                <li>Service Fees <span style="float:right;padding-right:5px;">2%</span></li>

            </ul>

            <div style="border-bottom: 1px solid #ccc;">
            </div>

            <ul>
                <li>Total Amount After Fees <span class="price_total" style="float:right;padding-right:5px;">00</span>
                  <input type="hidden" id="total_tk" name="total_tk">
                  <input type="hidden" id="price_load" name="price_load">
                </li>
            </ul>

    <ul class="nav nav-tabs" style="margin: 0px 20px;">

        <li class="activet test" onclick="two(this);pdetails(this,<?php echo $product_first->id; ?>);" style="margin-top:10px;margin-right:10px;"><a data-toggle="tab" style="text-transform:capitalize;color:#000;" href="#home<?php echo $product_first->id; ?>">{{$product_first->product_name}}</a></li>

        @foreach($products as $product)

        <li class="test" onclick="two(this);pdetails(this,<?php echo $product->id; ?>);" style="margin-top:10px;margin-right:10px;"><a data-toggle="tab" style="text-transform:capitalize;color:#000;" href="#home<?php echo $product->id; ?>">{{$product->product_name}}</a></li>

        @endforeach

        <!-- <li class="test" onclick="two(this);" style="margin-top:10px;margin-right:10px;"><a style="text-transform:capitalize;color:#000;" data-toggle="tab" href="#menu1">Reloadable Visa Card</a></li>

        <li class="test" onclick="two(this);" style="margin-top:10px;margin-right:10px;"><a style="text-transform:capitalize;color:#000;" data-toggle="tab" href="#menu2">Reloadable Master Card</a></li> -->


   </ul>

  <div class="tab-content">

    <div id="home<?php echo $product_first->id; ?>" style="padding: 20px;" class="tab-pane fade active show">

        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">$</span>
          
          <input type="text" class="form-control" placeholder="Enter Amount Minimum $5" onkeyup="getProduct(this,<?php echo $product_first->id; ?>)" name="online_card" id="online_card" aria-label="Username" aria-describedby="basic-addon1">
        </div>

    </div>

  @foreach($products as $product)
    <div id="home<?php echo $product->id; ?>" style="padding: 20px;" class="tab-pane fade">

        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">$</span>
          
          <input type="text" class="form-control" placeholder="Enter Amount" onkeyup="getProduct(this,<?php echo $product->id; ?>)" name="online_card" id="online_card" aria-label="Username" aria-describedby="basic-addon1">
        </div>

    </div>
  @endforeach

    <!-- <div id="menu1" style="padding:20px;" class="tab-pane fade">

        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">$</span>
          
          <input type="text" class="form-control" placeholder="Enter Amount" name="reloadable_visa_card" id="reloadable_visa_card" aria-label="Username" aria-describedby="basic-addon1">
        </div>

    </div>

    <div id="menu2" style="padding:20px;" class="tab-pane fade">
      <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">$</span>
          
          <input type="text" class="form-control" placeholder="Enter Amount" name="reloadable_master_card" id="reloadable_master_card" aria-label="Username" aria-describedby="basic-addon1">
        </div>

    </div> -->
  
  </div>
  <button type="button" onclick="save_card_order()" style="width: 100%;
    text-transform: uppercase;" class="btn btn-success" role="button"><span class="Button__Content"><span>Confirm</span></span></button>

    </form>    

  </div>
        
      
    </div>
  </div>
</div>







<script type="text/javascript">
   
function editOrder(id){
    var datastr="idr="+id;
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'edit-load-credit-requests?'+datastr, 
type: "get",
dataType: "json",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    // $('.modal-content').html(data);
    // $('#idd').val(data.id);
    // $('#user_idd').html(data.user_id);
    // $('#user_name').html(data.name);
    // $('#user_name1').html(data.name);
    // $('#user_email').html(data.email);
    // $('#cardholder_name').html(data.cardholder_name);
    // $('#card_code').html(data.card_code);
    // $('#amount').html(data.amount);
    // $('#total').html(data.total);
    // $('#created_at').html(data.created_at);
    // $('#c_status').val(data.status);
    // if(data.status=='1'){
    //     $("#c_status").attr('checked', true);
    // }

    // $('#user_idd').val(data.id);  
    // $('#exampleModalCenter').modal('show'); 
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

$('#update').click(function(){
    
    var status =$('#c_status').val().trim();
    var idd =$('#idd').val().trim();


    var data = new FormData();
    data.append('status', status);
    data.append('idd', idd);
    
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'update-load-credit-requests', 
type: "post",
data: data,
dataType: "json",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    // $('.modal-content').html(data); card_price
    // console.log(data); 
    // console.log(data);
    // console.log(data.price);
    // console.log(data);
    $('.card_price').html(price);
    $('.card_price').val(data.id);
}
});




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


function getProduct(elm,pro_id){
  var product_id = pro_id;
  var price_load = elm.value;

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'get_card_details', 
type: "get",
dataType: "json",
data: 'product_id='+product_id+'&price_load='+price_load,
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
  if(!data.price_load){
    $('.card_price').html('0');
  $('.price_total').html('0');
  // $('.modal-content').html(data);
  $('#total_tk').val('0');
  $('#price_load').val('0');
  $('#card_id').val('0');
}else{
  // console.log(data);
    $('.card_price').html(data.product_data.price);
    $('.price_total').html(data.price_with_vat);
    // $('.modal-content').html(data);
    $('#total_tk').val(data.price_with_vat);
    $('#price_load').val(data.price_load);
    $('#card_id').val(data.product_data.id);
}

}
});
    }

function pdetails(elm,pro_id){
  var product_id = pro_id;
  var price_load = elm.value;
 var cell = $('#card_img');
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: 'get_card_details', 
type: "get",
dataType: "json",
data: 'product_id='+product_id+'&price_load='+price_load,
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    // console.log(data);
    jQuery("#card_img").css('background-image', 'url(' + data.product_data.image + ')');
    // $('.card_price').html(data.product_data.price);
    // $('.price_total').html(data.price_with_vat);
    // // $('.modal-content').html(data);
    // $('#total_tk').val(data.price_with_vat);
    // $('#price_load').val(data.price_load);
    // $('#card_id').val(data.product_data.id);   
}
});
    }

function save_card_order(elm,pro_id){
  var total_tk = $('#total_tk').val();
  var card_id = $('#card_id').val();
  var price_load = $('#price_load').val();

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
url: 'save_card_details', 
type: "post",
dataType: "html",
data: data,
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    console.log(data);   
    $('#exampleModalCenter').modal('hide');
     location.reload();
}
});
    }
</script>

@endsection

