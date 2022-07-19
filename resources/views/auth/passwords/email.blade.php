<!DOCTYPE html>
<html>
<head>
	<title>Yufa - Digital Wallet | Password Reset Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		 <link rel="icon" type="image/png" sizes="56x56" href="{{asset('public/front_end/images/ico/favicon.png')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://yufacard.com/public/assets/style.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
	<div class="container infinity-container">
		<div class="row">
			<div class="col-md-1 infinity-left-space"></div>

			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">
				<div class="text-center mb-3 mt-5">

				</div>
				<div class="reset-form d-block">
				    
					
			            <form method="POST" action="{{ route('password.email') }}">
						    @csrf
							<div class="form-group">
							
							  
							@error('email')
							<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
							</span>
							@enderror	

				    	<h4>Reset Your password</h4>
						<br>
				        <p class="mb-3" style="color: #777">
				            Please enter your email address and we will send you a password reset link.
				        </p>
				        <div class="form-input">

							<label for="exampleInputEmail1"></label>
							<input type="email" required="" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter Email">
						</div>
				        <div class="mb-3"> 
							<button type="submit" class="btn">Send Reset Link</button>
						</div>
				    </form>



				</div>
				<div class="reset-confirmation d-none px-3">
					<div class="mb-4">
						<h4 class="mb-3">Link was sent</h4>
					    <h6 style="color: #777">Please, check your inbox for a password reset link.</h6>
					</div>
					<div class="mb-3">
					<a href="login.html">
					    <button type="submit" class="btn">Login Now</button>
					</a>
				</div>
			</div> 
			
			<div class="col-md-1 infinity-right-space"></div>
		</div>
	</div>

	<script type="text/javascript">
		function PasswordReset() {
	  	$('form.reset-password-form').on('submit', function(e) {
	      e.preventDefault();
	      $('.reset-form')
	      .removeClass('d-block')
	      .addClass('d-none');
		    $('.reset-confirmation').addClass('d-block');
			});
		}

		window.addEventListener('load', function() {
	    PasswordReset();
		});
	</script>




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
