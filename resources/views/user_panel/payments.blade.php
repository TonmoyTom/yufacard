@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<style type="text/css">
  #example_wrapper{
    width:100%;
    padding:0% 2%;
  }
  /*.page-body .page-content-wrapper{
    padding: 10px 10px;
  }*/
  
  ul#ONE{
    float:right;
  }
  ul#ONE li{
    display:inline-block;
  }
  table tr td{
    padding: 10px 0px 10px 10px !important;
  }
  .table tbody tr td span, table tbody tr td span {
    display:unset;
    align-items: center;
}
</style>

<div class="page-content-wrapper-inner">
  <div class="content-viewport">

    <div class="row">

      <div class="col-md-12">

          
      <ul id="ONE">
          <li>

            <a href="{{url('deposit')}}"><button class="btn btn-success" style="min-width: 110px;max-width: 100%;width: auto;margin-right: 10px;background:transparent;color:#4CCEAC;text-transform: uppercase;font-size: 16px;" >Deposit</button></a>
      </li>
      <li>
         <a href="{{url('load')}}"><button style="min-width: 110px;max-width: 100%;width: auto;text-transform: uppercase;
    font-size: 16px;color:#fff;" class="btn btn-success">Send</button></a>
      </li>
   </ul>
          <br/>
        
      </div>
      
    </div>

    <div class="row" style="margin-top:40px;">

      <div class="col-12" style="border:.5px solid #cccccc78;">
      </div>

    </div>
    
    <div class="row">

      <div class="col-12">
        <h4 style="text-align:center;">Payments</h4>
        <p class="text-gray" style="text-align:center;">Last 10 transactions in last month</p>
      </div>
    </div>

    <div class="row" style="overflow:auto;
    clear: both;
    display: block;">
      
      <div class="col-lg-12 equel-grid" >
        
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Card Holder Name</th>
                <!-- <th>Type</th> -->
                <th>Details</th>
                <th>Credit / Debit</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
           @foreach($order_credit as $order_cre) 
            <tr>
                <td><?php 
                $my_date = strtotime($order_cre->created_at);
                $my_date = date("Y-m-d", $my_date);
                echo $order_cre->created_at; ?></td>
                <td><?php echo $order_cre->name; ?></td>
                <td><?php echo $order_cre->payment_method_name; ?></td>
                <td>Credit</td>
                <td><?php echo $order_cre->amount; ?></td>
                <td>
                    <?php if($order_cre->status==1){ echo "<span style='margin: 0px;padding: 6px;' class='alert alert-success'>Completed</span>"; }else{
                      echo "<span style='margin: 0px;padding: 6px;' class='alert alert-danger'>Processing</span>";
                    } ?>
                </td>
            </tr>
            @endforeach
            
            @foreach($send_monies as $send_money) 
            <tr>
                <td><?php 
                $my_date = strtotime($send_money->created_at);
                $my_date = date("Y-m-d", $my_date);
                echo $send_money->created_at; ?></td>
                <td><?php echo $send_money->name; ?></td>
                <td><?php echo $send_money->payment_name; ?></td>
                <td>Debit</td>
                <td><?php echo $send_money->amount; ?></td>
                <td>
                    <?php if($send_money->status==1){ echo "<span style='margin: 0px;padding: 6px;' class='alert alert-success'>Completed</span>"; }else{
                      echo "<span style='margin: 0px;padding: 6px;' class='alert alert-danger'>Processing</span>";
                    } ?>
                </td>
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
        $('#example').DataTable(
            {
            "pageLength":8
        }
            );
    } );
    
    $(document).ready(function() {
        $('#example2').DataTable(
            {
            "pageLength":8
        }
            );
    } );
</script>

@endsection
