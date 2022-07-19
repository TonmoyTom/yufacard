<!DOCTYPE html>
<html>
<head>
	<title>Yufa - Digital Wallet | Register Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link rel="icon" type="image/png" sizes="56x56" href="{{asset('public/front_end/images/ico/favicon.png')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="public/assets/style.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
	<div class="container infinity-container">
		<div class="row">
			<div class="col-md-1 infinity-left-space"></div>

			<!-- FORM BEGIN -->
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">
				<!-- Company Logo -->
				<div class="text-center mb-3 mt-5">

				</div>
				<div class="text-center mb-4">
					<h4>Create an account</h4>
				</div>
				<br>
				<!-- Form -->



				<form method="POST" action="{{route('register')}}">
				@csrf
				<div class="form-input">

				<input type="text" required="" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Full Name">
                <label class="text-muted" for="exampleInputEmail1"><i class="icon-xxs icon sw-1.5 me-2" data-feather="user"></i></label>
				</div>
					
				
				<div class="form-input">
				<input type="text" required="" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
				<label class="text-muted" for="exampleInputEmail1"><i class="icon-xxs icon sw-1.5 me-2" data-feather="mail"></i></label>
				</div>
				
				<div class="form-input">
				<input type="text" required="" class="form-control" id="exampleInputEmail1" name="address" aria-describedby="emailHelp" placeholder="Your Home Address">
				<label class="text-muted" for="exampleInputEmail1"><i class="icon-xxs icon sw-1.5 me-2" data-feather="mail"></i></label>
				</div>
				
				<div class="form-input">
				<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				<label class="text-muted" for="exampleInputPassword1"><i class="icon-xxs icon sw-1.5 me-2" data-feather="lock"></i></label>
				</div>
				
				
				
				
				
				<!-- Register Button -->
		            <div class="mb-3"> 
						<button type="submit" class="btn btn-block">Register</button>
					</div>
					<div class="text-center mb-2">
	                   	<div class="text-center mb-3" style="color: #777;">or register with</div>
		                   	
	                   	<!-- Facebook Button -->
	                   	<a href="" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>

					</div>
					<div class="text-center mb-5" style="color: #777;">Already have an account? 
						<a class="login-link" href="login">Login here</a>
			       	</div>
				</form>
			</div>
			<!-- FORM END -->

			<div class="col-md-1 infinity-right-space"></div>
		</div>
	</div>



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


</body>
</html>
