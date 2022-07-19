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
          <a href="{{url('/view-card-orders')}}">Card Orders</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Add Card to User</li>
      </ol>
    </nav>
  </div>
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
  <div class="content-viewport">
    <div class="row">
      <div class="col-lg-6 equel-grid">
        <div class="grid">
          <p class="grid-header">Add Card to User </p>
          <div class="grid-body">
            <div class="item-wrapper">
              <form action="{{url('save-user-card')}}" method="post">

                @csrf

                <div class="form-group">
                  <label for="inputDescription">User ID</label>
                  <input type="text" name="user_id" value="{{$datas->user_id}}" class="form-control" id="inputDescription" placeholder="Enter User ID">

                  <input type="hidden" name="id" value="{{$datas->id}}" class="form-control" id="inputDescription" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label for="inputDescription">User Name</label>
                  <input type="text" name="name" value="{{$datas->name}}" class="form-control" id="inputDescription" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label for="inputDescription">User Email</label>
                  <input type="email" name="email" value="{{$datas->email}}" class="form-control" id="inputDescription" placeholder="Enter Email">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Cardholder Name</label>
                  <input type="text" name="cardholder_name" value="{{$datas->cardholder_name}}" class="form-control" id="inputDescription" placeholder="Enter Cardholder Name">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Card Code</label>
                  <input type="text" name="card_code" value="" class="form-control" id="inputDescription" placeholder="Enter Card Code">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Validity</label>
                  <input type="text" name="validity" value="" class="form-control" id="inputDescription" placeholder="Enter Validity">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Amount </label>
                  <input type="text" name="amount" value="{{$datas->amount_entered}}" class="form-control" id="inputDescription" placeholder="Enter Amount">
                </div>

                <div class="form-group">
                  <label for="inputDescription">CVV </label>
                  <input type="text" name="cvv" value="{{$datas->amount_entered}}" class="form-control" id="inputDescription" placeholder="Enter CVV">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Activate</label>
                  <input type="checkbox" name="status" id="status" value="1">
                </div>

               <div class="form-group">
                  <label for="inputDescription">Note </label>
                  <input type="text" name="note" value="" class="form-control" id="inputDescription" placeholder="Enter CVV">
                </div> 

                <button type="submit" class="btn btn-sm btn-primary">Confirm card order</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 equel-grid">
        
      </div>

    </div>
  </div>
</div>

@endsection