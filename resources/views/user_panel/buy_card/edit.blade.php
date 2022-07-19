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
          <a href="{{url('/view-categories')}}">Cards</a>
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
          <p class="grid-header">Update Card Type
</p>
          <div class="grid-body">
            <div class="item-wrapper">
              <form action="{{url('update-category')}}" method="post">

                @csrf
                <div class="form-group">
                  <label for="inputCard">Card Type</label>
                  <input type="text" required="" class="form-control" value="{{$cards->name}}" name="category_name" id="inputCard" placeholder="Enter your Card Type">
                  <input type="hidden" required="" class="form-control" value="{{$cards->id}}" name="category_id" id="inputCard" placeholder="Enter your Card Type">

                </div>
                <div class="form-group">
                  <label for="inputCardChoose">Card Level</label>
                  <select name="parent_id" id="inputCardChoose" class="custom-select">
                    <option selected="">Open this select menu</option>
                    @foreach($levels as $level)
                    <option <?php if($cards->parent_id !=='0'){ if($cards->parent_id==$level->id){ echo "selected"; } } ?> value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputDescription">Description</label>
                  <input type="text" name="description" value="{{$cards->description}}" class="form-control" id="inputDescription" placeholder="Enter your Description">
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Save Card</button>
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