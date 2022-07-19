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
          <a href="{{url('/view-categories')}}">Money</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Send Money</li>
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
                <th>Money</th>
                <th>Amount</th>
                <th>IBAN</th>
                <th>Beneficiary</th>
                <th>BIC</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sends as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->payment_name}}</td>
                <td>{{$data->amount}}</td>
                <td>{{$data->iban}}</td>
                <td>{{$data->beneficiary}}</td>
                <td>{{$data->bic}}</td>
                <td><?php $status = $data->status; if($status==1){echo "<i class='mdi mdi-check-circle-outline'></i>"; }else{ echo "<i class='mdi mdi-checkbox-blank-circle-outline'></i>"; } ?></td>
                
                <td>
                    <a class="btn btn-success" href="{{url('confirm-send-money/'.$data->id) }}"><i class="mdi mdi-exit-to-app"></i></a> 
                    </form>
                <a class="btn btn-danger" href="{{url('delete-send-money/'.$data->id) }}"><i class="mdi mdi-delete"></i></a></td>
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

