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
          <a href="{{url('/view-credit-orders')}}">Credit Orders</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Confirm Credit Order</li>
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
  <div class="content-viewport">
    <div class="row">
      <div class="col-lg-6 equel-grid">
        <div class="grid">
          <p class="grid-header">Confirm Credit Order </p>
          <div class="grid-body">
            <div class="item-wrapper">
              <form action="{{url('update-credit-order')}}" method="post">

                @csrf

                <div class="form-group">
                  <label for="inputDescription">Name</label>
                  <input type="text" name="name" value="{{$datas->name}}" class="form-control" id="inputDescription" placeholder="Enter Name">

                  <input type="hidden" name="user_id" value="{{$datas->user_id}}" class="form-control" id="inputDescription" placeholder="Enter User ID">

                  <input type="hidden" name="id" value="{{$datas->id}}" class="form-control" id="inputDescription" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Email</label>
                  <input type="email" name="email" value="{{$datas->email}}" class="form-control" id="inputDescription" placeholder="Enter Email">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Payment Method Name</label>
                  <input type="text" name="payment_method_name" value="{{$datas->payment_method_name}}" class="form-control" id="inputDescription" placeholder="Enter Payment Method">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Transaction Details</label>
                  <input type="text" name="transaction_details" value="{{$datas->transaction_details}}" class="form-control" id="inputDescription" placeholder="Enter Transaction Details">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Amount</label>
                  <input type="text" name="amount" value="{{$datas->amount}}" class="form-control" id="inputDescription" placeholder="Enter Amount">
                </div>

                <div class="form-group">
                   <p style="" target="_blank"><a class="btn btn-success" target="_blank" href="{{url('admin/add-credit/'.$datas->user_id)}}">Add Credit </a></p>
                </div>

                <div class="form-group">
                  <label for="status">Enable/Disable</label>
                  <input type="checkbox" name="status" <?php if($datas->status==1){echo "checked"; } ?> id="status" value="1">
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Confirm credit order</button>
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