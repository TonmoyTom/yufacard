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

    <div class="row" style="margin-top:12px;">

      <div class="col-12" style="border:.5px solid #cccccc78;">
      </div>

    </div>
    
    <div class="row">

      <div class="col-12">
        <h4 style="text-align:center;">Dashboard</h4>
        <p class="text-gray" style="text-align:center;">Last 10 transactions in last month</p>
      </div>
    </div>

    <div class="row" style="overflow: auto;
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
           @foreach($card_orders as $card_order) 
            <tr>
                <td><?php 
                $my_date = strtotime($card_order->created_at);
                $my_date = date("Y-m-d", $my_date);
                echo $card_order->created_at; ?></td>
                <td><?php echo $card_order->name; ?></td>
                <td><?php echo $card_order->card_selected; ?></td>
                
                <td>Debit</td>
                <td><?php echo $card_order->price; ?></td>
                <td>
                    <?php if($card_order->status==1){ echo "<span style='margin: 0px;padding: 6px;' class='alert alert-success'>Completed</span>"; }else{
                      echo "<span style='margin: 0px;padding: 6px;' class='alert alert-danger'>Processing</span>";
                    } ?>
                </td>
            </tr>
            @endforeach
            
            @foreach($load_credit_requests as $load_credit_request) 
            <tr>
                <td><?php 
                $my_date = strtotime($load_credit_request->created_at);
                $my_date = date("Y-m-d", $my_date);
                echo $load_credit_request->created_at; ?></td>
                <td><?php echo $load_credit_request->name; ?></td>
                <td><?php echo $load_credit_request->card_code; ?></td>
                
                <td>Card Deposit</td>
                <td><?php echo $load_credit_request->amount; ?></td>
                <td>
                    <?php if($load_credit_request->status==1){ echo "<span style='margin: 0px;padding: 6px;' class='alert alert-success'>Completed</span>"; }else{
                      echo "<span style='margin: 0px;padding: 6px;' class='alert alert-danger'>Processing</span>";
                    } ?>
                </td>
            </tr>
            @endforeach
            
            @foreach($statements as $statement) 
            <tr>
                <td><?php 
                $my_date = strtotime($statement->created_at);
                $my_date = date("Y-m-d", $my_date);
                echo $statement->created_at; ?></td>
                <td><?php echo $statement->name; ?></td>
                <td><?php echo $statement->transaction_type; ?></td>
                
                <td><?php echo $statement->status; ?></td>
                <td><?php echo $statement->credit_debit; ?></td>
                <td>
                    <?php if(isset($statement->status)){ echo "<span style='margin: 0px;padding: 6px;' class='alert alert-success'>Completed</span>"; } ?>
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
    
</script>

@endsection

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61657210157d100a41ac0230/1fhq4b512';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
