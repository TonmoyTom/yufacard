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
          <a href="{{url('/view-categories')}}">Documents</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Pending Verifications</li>
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
                <th>User Name</th>
                <th>Email</th>
                <th>Requested</th>
                <th>Image One</th>
                <th>Image Two</th>
                <th>Image Three</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->created_at}}</td>
                <td><img src="{{asset($data->image_one)}}" style="width:50px; height:50px;"> </td>
                <td><img src="{{asset($data->image_two)}}" style="width:50px; height:50px;"></td>
                <td><img src="{{asset($data->image_three)}}" style="width:50px; height:50px;"></td>
                
                <td><a class="btn btn-success" href="{{url('edit-documents/'.$data->id) }}">Confirm Order</a> <a class="btn btn-danger" href="{{url('delete-document/'.$data->id) }}">Delete</a></td>
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

