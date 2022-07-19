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
          <a href="{{url('/view-products')}}">Cards</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Add Card</li>
      </ol>
    </nav>
  </div>
<?php
    $message = Session::get('updateProduct');
    if($message){
?>
<h4 class="alert alert-success">
    <?php
        echo $message;
        Session::put('updateProduct','');
    ?>
</h4>
<?php } ?>

<?php
    $message = Session::get('deleteProduct');
    if($message){
?>
<h4 class="alert alert-success">
    <?php
        echo $message;
        Session::put('deleteProduct','');
    ?>
</h4>
<?php } ?>
  <div class="content-viewport">
    <div class="row">
        
      <div class="col-lg-12 equel-grid" style="margin-bottom:30px;">
        <a class="btn btn-info" href="{{url('create-product') }}">Add Card </a>
      </div>

        <div class="col-lg-12" style="overflow:auto;">
        
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Card Name</th>
                <th>Card Price</th>
                <th>Enabled</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->price}}</td>
                <td>
                  
                  <input type="checkbox" name="status" id="status" disabled="" <?php if($product->status==1){echo "checked"; } ?> value="{{$product->status}}">
                
                </td>
                <td><a class="btn btn-info" href="{{url('edit-product/'.$product->id) }}">Edit</a> <a class="btn btn-danger" href="{{url('delete-product/'.$product->id) }}">Delete</a></td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
        
      </div>

        
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

@endsection

