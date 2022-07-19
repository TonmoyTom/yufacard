<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('public/dario/assets/css/pageauthy.css')}}" rel="stylesheet">
    <title>Yufa - Digital Wallet | Virtual Visa Mastercard Service Provider World Wide</title>
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('public/front_end/images/ico/favicon.png')}}">
</head>
<body>

              <div class="main">
            <h1 style="text-align: center;">Success</h1>
            <div class="box">
            <h2 style="text-align: center;">A Confirmation Link Send Your Email Address</h2>                   
            <form method="POST" action="{{ route('password.email') }}">
            <br>   
            @csrf
    
            <h3 style="text-align: center;"> Verify Your Email Address </h3> 
            <hr/ style="background: blue;">
            <div class="form-group has-error">

             @if (session('resent'))
             <div class="alert alert-success" role="alert">
             {{ __('A fresh verification link has been sent to your email address.') }}
             </div>
             @endif
            
             {{ __('Before proceeding, please check your email for a verification link.') }}
             {{ __('If you did not receive the email') }},
        
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            <br>
            <br>
            @csrf
            <button type="submit" style="margin:0 auto;display: flex;" class="btn btn-link">{{ __('click here to request another') }}</button>
            </form>




            </div>  
            </div>
</body>
</html>