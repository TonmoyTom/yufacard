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
        <li class="breadcrumb-item active" aria-current="page">Add Credit</li>
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
              <form action="{{url('admin/update-credit')}}" method="post">

                @csrf

                <div class="form-group">
                  <label for="inputDescription">User Name</label>
                  <input type="text" name="name" value="{{$datas[0]->name}}" class="form-control" id="inputDescription" placeholder="Enter Name">

                  <input type="hidden" name="id" value="{{$datas[0]->id}}" class="form-control" id="inputDescription" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label for="inputDescription">User Email</label>
                  <input type="email" name="email" value="{{$datas[0]->email}}" class="form-control" id="inputDescription" placeholder="Enter Email">
                </div>


                <div class="form-group">
                  <label for="inputDescription">Country</label>
                  <input type="text" name="country" value="{{$datas[0]->country}}" class="form-control" id="inputDescription" placeholder="Enter Country">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Add Credit to user</label>
                  <input type="text" name="balance" value="{{$datas[0]->balance}}" class="form-control" id="inputDescription" placeholder="Enter Balance">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Verified ?</label>
                  <input type="checkbox" name="status" <?php if($datas[0]->status==1){echo "checked"; } ?> id="status" value="1">
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Update</button>
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