<!DOCTYPE html>
<html>
<head>
	<title>Yufa - Digital Wallet | login Page</title>
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
					<h4>Sign IN</h4>
				</div>
				<br>
				<!-- Form -->



				<form form method="POST" action="{{ route('login') }}" class="needs-validation login100-form validate-form">
				@csrf
				<input type="email" class="form-control @error('email')-invalid @enderror" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
					


				<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" id="password" />


				<div class="row mb-3">
				
				<!-- Remember Box -->
			    <div class="col-auto d-flex align-items-center">
			    <div class="custom-control custom-checkbox">
			    <input type="checkbox" class="custom-control-input" id="cb1">
                <label class="custom-control-label" for="cb1">Remember me</label>
			    </div>
				</div>
			   	</div>

		        <div class="mb-3"> 
				<button type="submit" class="btn btn-block">Login</button>
				<label class="form-check-label" for="exampleCheck1"> </label>
				</div>
				
				
				<div class="text-right ">
		        <a href="{{ route('password.request') }}" class="forget-link">Forgot password?</a>
		        </div>
				<div class="text-center mb-2">
	            <div class="text-center mb-3" style="color: #777;">or login with</div>
		                   	
	                   	<!-- Facebook Button -->
	                   	<a href="" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>

					</div>
					<div class="text-center mb-5" style="color: #777;">Don't have an account? 
						<a class="register-link" href="register">Register here</a>
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
