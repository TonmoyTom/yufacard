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
          <a href="{{url('/view-credit-orders')}}">Document</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"> Verification</li>
      </ol>
    </nav>
  </div>


  <div class="content-viewport">
    <div class="row">
      <div class="col-lg-6 equel-grid">
        <div class="grid">
          <p class="grid-header">Confirm Credit Order </p>
          <div class="grid-body">
            <div class="item-wrapper">
              <form action="{{url('update-document')}}" method="post">

                @csrf

                <div class="form-group">
                  <label for="inputDescription">User Name</label>
                  <input type="text" disabled name="name" value="{{$datas->name}}" class="form-control" id="inputDescription" placeholder="Enter Name">

                  <input type="hidden" name="id" value="{{$datas->id}}" class="form-control" id="inputDescription" placeholder="Enter User ID">
                </div>

                <div class="form-group">
                  <label for="inputDescription">User Email</label>
                  <input type="email" disabled name="email" value="{{$datas->email}}" class="form-control" id="inputDescription" placeholder="Enter Email">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Country</label>
                  <input type="text" disabled name="country" value="{{$datas->country}}" class="form-control" id="inputDescription" placeholder="Enter Payment Method">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Phone</label>
                  <input type="text" disabled name="phone" value="{{$datas->phone}}" class="form-control" id="inputDescription" placeholder="Enter Transaction Details">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Balance</label>
                  <input type="text" disabled name="balance" value="{{$datas->balance}}" class="form-control" id="inputDescription" placeholder="Enter Amount">
                </div>

                <div class="form-group">
                  <label for="status">Enable/Disable</label>
                  <input type="checkbox" name="status" <?php if($datas->status==1){echo "checked"; } ?> id="status" value="1">
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