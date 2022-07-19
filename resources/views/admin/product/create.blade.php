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
        <li class="breadcrumb-item active" aria-current="page">Add New Card</li>
      </ol>
    </nav>
  </div>
<?php
	$message = Session::get('storeProduct');
	if($message){
?>
<h4 class="alert alert-success">
	<?php
		echo $message;
		Session::put('storeProduct','');
	?>
</h4>
<?php } ?>
  <div class="content-viewport">
    <div class="row">
      <div class="col-lg-6 equel-grid">
        <div class="grid">
          <p class="grid-header">Add New Card
</p>
          <div class="grid-body">
            <div class="item-wrapper">
              <form action="{{url('save-product')}}" method="post" enctype="multipart/form-data" >
              	@csrf

                <div class="form-group">
                  <label for="inputCardChoose">Under Category</label>
                  <select name="parent_id" id="inputCardChoose" class="custom-select">
                    <option selected="">Open this select menu</option>
                    @foreach($levels as $level)
                    <option value="{{$level->id}}">{{$level->name}}</option>

                    <?php $child_cats = DB::table('products')->where('category_id',$level->id)->get(); ?>

                    @foreach($child_cats as $child_cat)
                    <option value="{{$child_cat->id}}">{{$child_cat->product_name}}</option>
                    @endforeach

                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label for="inputCard">Card Name</label>
                  <input type="text" required="" class="form-control" name="product_name" id="inputCard" placeholder="Enter your Card Type">
                </div>

                <div class="form-group">
                  <label for="inputCard">Card Card Image</label>
                  <input type="file" required="" class="form-control" name="product_name" id="inputCard" placeholder="Enter your Card Type">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Note</label>
                  <input type="text" name="description" class="form-control" id="inputDescription" placeholder="Enter Note">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Card Price</label>
                  <input type="text" name="price" class="form-control" id="inputDescription" placeholder="Enter Price">
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