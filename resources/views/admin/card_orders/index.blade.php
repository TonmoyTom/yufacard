@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<style type="text/css">
    td{
    width: 110px;
    max-width:110px;
    word-wrap: break-word;
    /*word-break: break-all;*/
    /*overflow: hidden;*/
    white-space: break-spaces !important;
  }
  th{
    width: 110px;
    max-width:110px;
    word-wrap: break-word;
    /*word-break: break-all;*/
    overflow: hidden;
    white-space: break-spaces !important;
  }
</style>

<div class="page-content-wrapper-inner">
  <div class="viewport-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb has-arrow">
        <li class="breadcrumb-item">
          <a href="{{url('/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/view-categories')}}">Orders</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">View Card Orders</li>
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
  <div class="content-viewport">
    <div class="row">

        <div class="col-lg-12 equel-grid" style="overflow:auto;">
        
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Order No</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Cardholder Name</th>
                <th>Card Selected</th>
                <th>Amount Entered</th>
                <th>Total Amount</th>
                <th>Ordered</th>
                <th>Confirmed</th>
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
                <td>{{$data->cardholder_name}}</td>
                <td>{{$data->card_selected}}</td>
                <td>{{$data->amount_entered}}</td>
                <td>{{$data->total}}</td>
                <td>{{$data->created_at}}</td>
                <td>
                    <input type="checkbox" name="status" disabled="" <?php if($data->status==1){echo "checked"; } ?> id="status" value="1">
                </td>
                <td><a target="_blank" class="btn btn-success" href="{{url('edit-card/'.$data->id) }}">Confirm Order</a> <a class="btn btn-danger" href="{{url('delete-card/'.$data->id) }}">Delete</a></td>
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

