@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<style type="text/css">
/*#example_wrapper{
width:100%;
padding:0% 2%;
}
.page-body .page-content-wrapper{
padding: 10px 10px;
}*/
#card1:hover {
border: 1px solid rgba(255, 155, 30, 0.3) !important;
}
.activet{
border-bottom: 3px solid #ff9b1e;
color: #ff9b1e;
}
ul#ONE{
float:right;
}
ul#ONE li{
display:inline-block;
}
.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
  border:none;
}
.nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus{
  border:none;
}
</style>

<!-- <a class="btn btn-success" data-toggle="modal" onclick="editOrder()" data-target="#exampleModalCenter">
Confirm Order
</a> -->

<div class="page-content-wrapper-inner">

<meta name="csrf-token" content="{{ csrf_token() }}">

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
$message2 = Session::get('load_credit_requests');
if($message2){
?>

<h4 class="alert alert-success">
<?php
echo $message2;
Session::put('load_credit_requests','');
?>
</h4>

<?php } ?>

<?php 
$user_info = Auth::user();
?>

<div class="content-viewport">

<div class="row">

<div class="col-md-12">


<ul id="ONE">
<li>

  <a href="{{url('deposit')}}">
    <button class="btn btn-success" style="min-width: 110px;max-width: 100%;width: auto;margin-right: 10px;background:transparent;color:#4CCEAC;text-transform: uppercase;font-size: 16px;" >Deposit</button></a>
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

<div class="col-lg-12" style="margin-top:30px;">

    <div class="grid"><div class="item-wrapper"><div class="tab-container vertical-tabs">

      <ul class="nav nav-tabs" style="float: left;width:25%;display: flex;flex-direction: column;" id="bt-tab_4" role="tablist">

        <li class="nav-item"><a class="nav-link active" id="bt-tab_4_1" data-toggle="tab" href="#bt-content_4_1" role="tab" aria-controls="bt-content_4_1" aria-selected="true"><i class="mdi mdi-account"></i> Account</a></li>

        <li class="nav-item"><a class="nav-link" id="bt-tab_4_2" data-toggle="tab" href="#bt-content_4_2" role="tab" aria-controls="bt-content_4_2" aria-selected="false"><i class="mdi mdi-inbox-multiple"></i>Phone</a></li>
        
        <li class="nav-item"><a class="nav-link" id="bt-tab_4_2" data-toggle="tab" href="#bt-content_4_20" role="tab" aria-controls="bt-content_4_20" aria-selected="false"><i class="mdi mdi-inbox-multiple"></i>Document</a></li>
        
        <li class="nav-item"><a class="nav-link" id="bt-tab_4_2" data-toggle="tab" href="#bt-tab_4_23" role="tab" aria-controls="bt-tab_4_23" aria-selected="false"><i class="mdi mdi-inbox-multiple"></i> Status</a></li>

        <li class="nav-item"><a class="nav-link" id="bt-tab_4_3" data-toggle="tab" href="#bt-content_4_3" role="tab" aria-controls="bt-content_4_3" aria-selected="false"><i class="mdi mdi-cart"></i>Password</a></li>

      </ul>


      <div style="float: left;width:70%;padding: 30px 20px 20px 10px;" class="tab-content" id="bt-tab_content_4">
        <div class="tab-pane show active" id="bt-content_4_1" role="tabpanel" aria-labelledby="bt-tab_4_1">
        
        <?php 
          $user_id = $user_info->id;
          $user_details = DB::table('users')->where('id',$user_id)->first();

          ?>

        <div class="form-group">
            <form method="post" action="">
              @csrf
            <?php
              if($user_details->avatar){?>

                <img style="border-radius: 50%;width:86px;" src="{{asset($user_details->avatar)}}" > 

            <?php } else{ ?>



            <?php } ?>
             
            <input type="hidden" id="user_id1" value="<?php echo $user_info->id; ?>" name="">
            <label for="files" class="btn">Upload Image</label>
            <input onchange="ImageUpdate()" id="files" style="visibility:hidden;" type="file">
          </form>
        </div>

        <div class="form-group">

          
          <div style="margin-bottom: 15px;
    border: 1px solid #ccc;padding: 5px 12px 5px 12px;height: 50px;background: aliceblue;" for="email" class="form-control"><span style="font-weight:bold;color:#738495;">Name</span><br/>
            <span style="text-transform:uppercase;"><?php echo $user_details->name; ?></span>
          </div>

          <div style="margin-bottom: 15px;
    border: 1px solid #ccc;padding: 5px 12px 5px 12px;height: 50px;background: aliceblue;" for="email" class="form-control"><span style="font-weight:bold;color:#738495;">EMAIL</span><br/>
            <span><?php echo $user_details->email; ?></span>
          </div>

          <div style="margin-bottom: 15px;
    border: 1px solid #ccc;padding: 5px 12px 5px 12px;height: 50px;background: aliceblue;" for="email" class="form-control"><span style="font-weight:bold;color:#738495;">Country</span><br/>
            <span><?php echo $user_details->country; ?></span>
          </div>


        </div>


        </div>


          <div class="tab-pane" id="bt-content_4_2" role="tabpanel" aria-labelledby="bt-tab_4_2">

            <div class="form-group">
              <form method="post" action="{{url('update-phone-number')}}">
                @csrf

              <input type="hidden" id="user_id1" value="<?php echo $user_info->id; ?>" name="user_id2">
                
              <input type="text" class="form-control" value="<?php echo $user_details->phone; ?>" style="margin-bottom: 15px;
    border: 1px solid #ccc;padding: 5px 12px 5px 12px;height: 50px;background: aliceblue;" placeholder="Enter Phone Number" name="phone">
            </div>

            <div class="form-group">

              <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
          color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Update</span></button>
              </form>
            </div>

          </div>
          
          <div class="tab-pane" id="bt-content_4_20" role="tabpanel" aria-labelledby="bt-tab_4_20">
              
             <div class="row" style="background:aliceblue;padding: 30px 0px;">
            
            <form method="post" enctype="multipart/form-data" action="{{url('save-document')}}">
                @csrf

              <input type="hidden" id="user_id1" value="<?php echo $user_info->id; ?>" name="user_id2">
                 
             <div class="form-group row showcase_row_area">
              <div class="col-md-7 showcase_text_area">
                <label for="inputEmail10">Document(Passport, Id Card, Driving License)</label>
              </div>
              <div class="col-md-5 showcase_content_area">
                <span>Front Part*</span> 
                <input type="file" name="fdocument" required="" class="form-control" id="inputEmail10" placeholder="Enter your name">
              </div>
            </div> 
            
            <div class="form-group row showcase_row_area">
              <div class="col-md-7 showcase_text_area">
                <label for="inputEmail10"></label>
              </div>
              <div class="col-md-5 showcase_content_area">
                <span>Back Part*</span>
                <input type="file" name="bdocument" required="" class="form-control" id="inputEmail10" placeholder="Enter your name">
              </div>
            </div> 
            
            <div class="form-group row showcase_row_area">
              <div class="col-md-7 showcase_text_area">
                <label for="inputEmail10">Address Verification(Bank Statement, Gass Bill)</label>
              </div>
              <div class="col-md-5 showcase_content_area">
                  <span>Image*</span>
                <input type="file" name="vdocument" required="" class="form-control" id="inputEmail10" placeholder="Enter your name">
              </div>
            </div> 
            <br/>
            <button type="submit" class="float-right" style="padding: 12px 12px 12px 12px;background: #696ffb;
          color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Upload Document</span></button>
            
            </form>
            
            </div>


          </div>
          
          <div class="tab-pane" id="bt-tab_4_23" role="tabpanel" aria-labelledby="bt-tab_4_23">
              
             <div class="row" style="background:aliceblue;padding: 0px 20px;">
              
              <table class="table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="padding:0px;" ><?php if(isset($document->created_at)){ echo $document->created_at; } ?></td>
                    <td style="padding:0px;"><?php if(isset($document->created_at)){ echo 'Doc/Pdf/Image'; } ?></td>
                    <td style="padding:0px;" >
                    <?php 
                    if(isset($document->status)){ 
                    $status = $document->status; } 
                    else{
                    $status = "";
                    }
                    
                    if($status==1){ 
                        echo "<span class='alert alert-success' style='margin: 1.25rem;'>Verified</span>";
                     } 
                    else if($status==2){
                       echo "<span class='alert alert-info' style='margin: 1.25rem;' >Under Review</span>";
                    }
                    
                    
                    ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            
            </div>


          </div>


          <div class="tab-pane" id="bt-content_4_3" role="tabpanel" aria-labelledby="bt-tab_4_3">

            <div class="form-group">
              <form method="post" action="{{url('update-password')}}">
                @csrf

              <input type="hidden" id="user_id1" value="<?php echo $user_info->id; ?>" name="user_id2">
                
              <input type="text" class="form-control" style="margin-bottom: 15px;
    border: 1px solid #ccc;padding: 5px 12px 5px 12px;height: 50px;background: aliceblue;" placeholder="Old Password" name="old_password">
            </div>

            <div class="form-group">
              <input type="text" name="new_password" style="margin-bottom: 15px;border: 1px solid #ccc;padding: 5px 12px 5px 12px;height: 50px;background: aliceblue;" required="" name="new_password" class="form-control" placeholder="New Password">
              
            </div>

            <div class="form-group">

              <button type="submit" class="float-right" style="padding: 12px 20px 12px 20px;background: #696ffb;
          color: #fff;border: none;" class="Button Button--Form Button--Small" aria-busy="false" role="button"><span class="Button__Content">Change</span></button>
              </form>
            </div>

          </div>


          </div></div></div></div>

</div>

</div>


</div>
</div>

<style type="text/css">
/*.active{
border-bottom: 3px solid #ff9b1e;
color: #ff9b1e;
transition: color 0.2s ease, border-bottom-color 0.2s ease;
}*/
</style>

<script type="text/javascript">
  $("#files").change(function() {
    filename = this.files[0].name
    console.log(filename);
});

 function ImageUpdate(){
  var image = $('#files').prop('files')[0];
  var user_id1 = $('#user_id1').val();

  var data = new FormData();
  data.append('image', image);
  data.append('user_id1', user_id1);

  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    jQuery.ajax({
    url: 'profile-update',
    method: 'POST',
    type: "post",
    data: data,
    dataType: "html",
    encode  : true,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data){
      console.log(data);
      location.reload();
    // toastr.success("{{ Session::get('updatePost') }}");
    // $('#ld').load('/MamaEcoMultivendor/admin/category');
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
    });
 }
</script>

@endsection



