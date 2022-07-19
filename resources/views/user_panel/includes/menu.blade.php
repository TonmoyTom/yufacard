<header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href="https://www.facebook.com/brptocard"><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{url('/')}}">
                    	<h1><img src="{{asset('public/front_end/images/logo.png')}}" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                        <li class="dropdown"><a href="{{url('services')}}">Cards </a> </li>
                        <li><a href="{{url('pricing')}}">Pricing</a></li>    
                        
                        
                        
                        <?php $user_data = Auth::user(); if($user_data==''){ ?>
                 <li><a href="{{url('contact-us')}}">Contact Us</a></li>                   
    	    	   <li><a href="{{url('login')}}">Login</a></li>  
    	    	    
    	    	    <?php } ?>
    	    	    
    	    	    <?php $user_data = Auth::user(); if($user_data){ ?>
    	    	    
    	    	    <li>
    	    	    
    	    	    	<a href="{{ url('logout') }}" class="nav-link"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                     Logout
                       </a>
                       
                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                            {{ csrf_field() }}
                       </form>
                       
    	    	    </li>
    	    	    <?php }else{ ?>
    	    	    
    	    	    
    	    	     <li><a href="{{url('register')}}">Register</a></li> 
    	    	    
    	    	    
    	    	     <?php } ?>
    	    	     
    	    	     
                        

                    </ul>
                </div>
                
            </div>
        </div>
    </header>