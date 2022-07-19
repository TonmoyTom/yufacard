@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

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
        <li class="breadcrumb-item active" aria-current="page">Card Types</li>
      </ol>
    </nav>
  </div>
<?php
    $message = Session::get('updateCategory');
    if($message){
?>
<h4 class="alert alert-success">
    <?php
        echo $message;
        Session::put('updateCategory','');
    ?>
</h4>
<?php } ?>

<?php
    $message = Session::get('deleteCategory');
    if($message){
?>
<h4 class="alert alert-success">
    <?php
        echo $message;
        Session::put('deleteCategory','');
    ?>
</h4>
<?php } ?>
  <div class="content-viewport">
    <div class="row">
        
      <div class="col-lg-12 equel-grid" style="margin-bottom:30px;">
        <a class="btn btn-info" href="{{url('create-category') }}">Add Card Type </a>
      </div>

        <div class="col-lg-12 equel-grid">
        
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Card Name</th>
                <th>Category Lavel</th>
                <th>Description</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td>{{$categorie->name}}</td>
                <td>{{$categorie->parent_id}}</td>
                <td>{{$categorie->description}}</td>
                <td>{{$categorie->url}}</td>
                <td><a class="btn btn-info" href="{{url('edit-categories/'.$categorie->id) }}">Edit</a> <a class="btn btn-danger" href="{{url('delete-categories/'.$categorie->id) }}">Delete</a></td>
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

