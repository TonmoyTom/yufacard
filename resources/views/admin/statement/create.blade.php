@extends('layouts.app')


@section('content')

<div class="page-content-wrapper-inner">
  <div class="viewport-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb has-arrow">
        <li class="breadcrumb-item">
          <a href="{{url('/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/view-card-statement-requests')}}">Cards</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Add Statement</li>
      </ol>
    </nav>
  </div>

<?php
	$message = Session::get('storeCategory');
	if($message){
?>
<h4 class="alert alert-success">
	<?php
		echo $message;
		Session::put('storeCategory','');
	?>
</h4>
<?php } ?>


<?php
  $message = Session::get('saveStatement');
  if($message){
?>
<h4 class="alert alert-success">
  <?php
    echo $message;
    Session::put('saveStatement','');
  ?>
</h4>
<?php } ?>

<?php
  $message = Session::get('updateStatement');
  if($message){
?>
<h4 class="alert alert-success">
  <?php
    echo $message;
    Session::put('updateStatement','');
  ?>
</h4>
<?php } ?>


<?php
  $message = Session::get('deleteStatement');
  if($message){
?>
<h4 class="alert alert-success">
  <?php
    echo $message;
    Session::put('deleteStatement','');
  ?>
</h4>
<?php } ?>



  <div class="content-viewport">
    <div class="row">
   
   <form action="{{url('save-statement')}}" method="post"> 
        @csrf

      <div class="col-lg-12 equel-grid">
        <div class="grid">
          <p class="grid-header">Add Card Statement </p>

          <div class="grid-body">
            <div class="item-wrapper">
              
                <div class="form-group">
                  <label for="inputCard">User ID</label>
                  <input type="text" required="" class="form-control" name="user" value="{{$user->user_id}}" id="inputCard" placeholder="Enter your User ID">
                </div>

                <div class="form-group">
                  <label for="inputDescription">User Name</label>
                  <input type="text" name="name" value="{{$user->name}}" class="form-control" id="inputDescription" placeholder="Enter User Name">
                </div>

                <div class="form-group">
                  <label for="inputDescription2">User Email</label>
                  <input type="text" name="email" value="{{$user->email}}" class="form-control" id="inputDescription2" placeholder="Enter User Email">
                </div>

                <div class="form-group">
                  <label for="inputDescription3">Cardholder Name</label>
                  <input type="text" name="cardholder_name" value="{{$user->cardholder_name}}" class="form-control" id="inputDescription3" placeholder="Enter Cardholder Name">
                </div>

                <div class="form-group">
                  <label for="inputDescription4">Card Code</label>
                  <input type="text" name="card_code" value="{{$user->card_code}}" class="form-control" id="inputDescription4" placeholder="Enter Card Code">
                </div>

</div>
 </div>

  </div>
</div>


      <div class="col-lg-12 equel-grid" style="clear: both;display: block;overflow: hidden;">          

        <div class="form-group">

          <div class="optionBox">
          <div class="block">
              <input type="text" name="transaction_date[]" placeholder="Transaction Date" />

              <input type="text" name="transaction_type[]" placeholder="Transaction Type" /> 

              <input type="text" name="status[]" placeholder="Status" />
              <input type="text" name="credit_debit[]" placeholder="Credit/Debit" /> 

              <input type="text" placeholder="Note" name="note[]" /> <span class="add">Add Option</span>
          </div>
          </div>
          </div>

          <div class="form-group">
            
            <button type="submit" class="btn btn-sm btn-primary">Add Statement</button>

          </form>
            
        
         </div>

      </div>


      <div class="col-lg-12 equel-grid" style="overflow:auto;">
        
     <form action="{{url('update-statement')}}" method="post"> 
        @csrf

        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Transaction Date</th>
                <th>Transaction Type</th>
                <th>Status</th>
                <th>Credit/Debit</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($statements as $statement) 
            <tr>
                <td>
                  <input type="text" value="{{$statement->user_id}}" name="user_id" > 

                  <input type="hidden" value="{{$statement->id}}" name="id" > 

                </td>

                <td><input type="text" value="{{$statement->transaction_date}}" name="transaction_date" ></td>

                <td><input type="text" value="{{$statement->transaction_type}}" name="transaction_type" ></td>

                <td><input type="text" value="{{$statement->status}}" name="status" ></td>

                <td><input type="text" value="{{$statement->credit_debit}}" name="credit_debit" ></td>

                <td><input type="text" value="{{$statement->note}}" name="note" ></td>

                <td>
                    
                    <!-- <a class="btn btn-info" href="">Update</a> -->
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>

                    <a style="color:#fff;" class="btn btn-danger"  onclick="deleteStatement(<?php echo $statement->id; ?>)">
                      Delete
                    </a>

                </td>
            </tr>
            @endforeach
            
            
        </tbody>
        
    </table>

  </form>
        
      </div>


    </div>
  </div>
</div>

<script type="text/javascript">

  $('.add').click(function() {
    $('.block:last').after('<div class="block"><input style="margin: 0px 4px 0px 0px;" type="text" name="transaction_date[]" placeholder="Transaction Date" /><input type="text" style="margin: 0px 4px 0px 0px;" name="transaction_type[]" placeholder="Transaction Type" /><input type="text" style="margin: 0px 4px 0px 0px;" name="status[]" placeholder="Status" /><input type="text" style="margin: 0px 4px 0px 0px;" name="credit_debit[]" placeholder="Credit/Debit"/><input type="text" style="margin: 0px 4px 0px 0px;" placeholder="Note" name="note[]"/><span class="remove">Remove Option</span></div>');
  });
  $('.optionBox').on('click','.remove',function() {
    $(this).parent().remove();
  });

</script> 

<script type="text/javascript">
// delete statement 

function deleteStatement(id){
    var datastr="idr="+id;
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
jQuery.ajax({
url: '/delete-statement?'+datastr, 
type: "get",
dataType: "html",
encode  : true,
cache: false,
contentType: false,
//contentType: "application/json; charset=utf-8",
processData: false,
success: function(data){
    window.location.reload();
}
});

} 

</script>


@endsection