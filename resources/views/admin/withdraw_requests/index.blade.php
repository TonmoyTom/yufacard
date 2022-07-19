@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<style type="text/css">

</style>

<div class="page-content-wrapper-inner">
  <div class="viewport-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb has-arrow">
        <li class="breadcrumb-item">
          <a href="{{url('/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/view-withdraw-requests')}}">Orders</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">View Withdraw Requests</li>
      </ol>
    </nav>
  </div>
<?php
    $message = Session::get('updateCard');
    if($message){
?>
<h4 class="alert alert-success">
    <?php
        echo $message;
        Session::put('updateCard','');
    ?>
</h4>
<?php } ?>

<?php
    $message = Session::get('deleteCard');
    if($message){
?>

<h4 class="alert alert-success">
    <?php
        echo $message;
        Session::put('deleteCard','');
    ?>
</h4>

<?php } ?>


<?php
    $message2 = Session::get('deleteWithdrawRequests');
    if($message2){
?>

<h4 class="alert alert-success">
    <?php
        echo $message2;
        Session::put('deleteWithdrawRequests','');
    ?>
</h4>

<?php } ?>

  <div class="content-viewport">
    <div class="row">

        <div class="col-lg-12 equel-grid" style="overflow:auto;">
        
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Order No</th>
                <th>User ID</th>
                <th>Name</th>
                <th>User Email</th>
                <th>Confirmed/Pending</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->user_id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                
                <td>
                    <input type="checkbox" name="status" disabled="" <?php if($data->status==1){echo "checked"; } ?> id="status" value="1">
                </td>
                <td>
                    <a class="btn btn-success" data-toggle="modal" onclick="editOrder(<?php echo $data->id; ?>)" data-target="#exampleModalCenter">
                      Confirm Order
                    </a>
                    <!-- <a class="btn btn-success" href="{{url('edit-card/'.$data->id) }}">Confirm Order</a>  -->
                    <a class="btn btn-danger" href="{{url('delete-withdraw-request/'.$data->id) }}">Delete</a></td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
        
      </div>

        
    </div>
  </div>
</div>


<!-- modal data start here -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">

        <form method="post">
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h5 class="modal-title" id="exampleModalLongTitle"><span id="user_name1"> </span> Withdraw Request</h5>
        <h4 class="modal-title">Requested at:<span id="created_at"> </span></h4>

        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> -->

        </button>
        </div>
        <div class="modal-body">
        <div class="col-md-12">
            User ID:<span id="user_idd"> </span>
        </div>

        <div class="col-md-12">
            Name:<span id="user_name"> </span>
        </div>

        <div class="col-md-12">
            Email:<span id="user_email"> </span>
        </div>

        <div class="col-md-12">
            Payment Method Name: <span id="payment_method"> </span>
        </div>
        <div class="col-md-12">
            Recipient: <span id="recipient"> </span>
        </div>
        <div class="col-md-12">
            Amount Entered: <span id="amount_entered"> </span>$
            <input type="hidden" id="idd" name="">
        </div>

        <div class="col-md-12">
            Total (after fee): <span id="total"> </span>$
        </div>

        <div class="col-md-12">
            Confirm? (chek the box after adding fund)
            <input type="checkbox" name="c_status" id="c_status" value="">
        </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary">Confirm</button>
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
url: 'edit-withdraw-requests?'+datastr, 
type: "get",
dataType: "json",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    // $('.modal-content').html(data);
    console.log(data);
    $('#idd').val(data.id);
    $('#user_idd').html(data.user_id);
    $('#user_name').html(data.name);
    $('#user_name1').html(data.name);
    $('#user_email').html(data.email);
    $('#payment_method').html(data.payment_method_name);
    $('#recipient').html(data.recipient);
    $('#amount_entered').html(data.amount);
    $('#total').html(data.total);
    $('#created_at').html(data.created_at);
    $('#c_status').val(data.status);
    if(data.status=='1'){
        $("#c_status").attr('checked', true);
    }
    



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
url: 'update-withdraw-request', 
type: "post",
data: data,
dataType: "html",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    // $('.modal-content').html(data);
    // console.log(data); 
    alert(data);
     window.location.reload();
}
});




});

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

@endsection

