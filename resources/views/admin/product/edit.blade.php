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
          <a href="{{url('/view-products')}}">Cards</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Update Card Type</li>
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
          <p class="grid-header">Update Card
</p>
          <div class="grid-body">
            <div class="item-wrapper">
              <form action="{{url('update-product')}}" enctype="multipart/form-data" method="post">

                @csrf

                <div class="form-group">
                  <label for="inputCardChoose">Under Category </label>
                  <select name="parent_id" id="inputCardChoose" class="custom-select">
                    <option>Open this select menu</option>
                    @foreach($levels as $level)
                    <option <?php if($cards->id ==$level->id){ echo "selected"; }  ?> value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputCard">Card Name</label>
                  <input type="text" required="" class="form-control" value="{{$product->product_name}}" name="product_name" id="inputCard" placeholder="Enter your Card Type">
                  <input type="hidden" required="" class="form-control" value="{{$product->id}}" name="product_id" id="inputCard" placeholder="Enter your Card Type">

                </div>
                
                <div class="form-group">
                  <label for="inputCard">Card Image</label>
                  <img src="{{asset($product->image)}}" style="width:400px;height:255px;">
                  <input type="file" class="form-control" name="product_image" id="inputCard" placeholder="Enter your Card Type">

                </div>

                <div class="form-group">
                  <label for="inputDescription">Note
</label>
                  <input type="text" name="description" value="{{$product->description}}" class="form-control" id="inputDescription" placeholder="Enter your Note">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Card Price</label>
                  <input type="text" name="price" value="{{$product->price}}" class="form-control" id="inputDescription" placeholder="Enter Card Price">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Enable/Disable</label>
                  <input type="checkbox" name="status" id="status" <?php if($product->status==1){echo "checked"; } ?> value="1">
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Update Card</button>
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