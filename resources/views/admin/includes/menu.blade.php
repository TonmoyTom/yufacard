
<div class="user-profile">
    <div class="display-avatar animated-avatar">
     <?php 
       $user_data = Auth::user(); 
       if(isset($user_data->id)){
       $user_id2 = $user_data->id;
       $user_dt = DB::table('users')->where('id',$user_id2)->first();
       }
       if(isset($user_dt->avatar)){
       ?>
       
       <img class="profile-img img-lg rounded-circle" src="{{asset($user_dt->avatar)}}" alt="profile image">

      <?php } else { ?> 

      <img class="profile-img img-lg rounded-circle" src="{{asset('public/img/default.jpg')}}" alt="profile image">

      <?php } ?>

    </div>
    <div class="info-wrapper">
      <p class="user-name" style="text-transform:capitalize;"><?php $user_data = Auth::user(); if(isset($user_data->name)){
  echo $user_data->name;} ?></p>
      <h6 class="display-income">
        <?php $dt = Auth::user(); if($dt){ ?>
          {{ DB::table('users')
                ->select('users.balance')
                ->where('users.id',Auth::user()->id)
                ->sum('users.balance') }} $ 
        <?php } ?>
    </h6>
    </div>
  </div>

  @hasanyrole('writer|editor|publisher|admin')

  <ul class="navigation-menu">
    <li class="nav-category-divider">MAIN</li>
    <li>
      <a href="{{url('home')}}">
        <span class="link-title">Dashboard</span>
        <i class="mdi mdi-gauge link-icon"></i>
      </a>
    </li>
    
    <li>
      <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
        <span class="link-title">Card Type</span>
        <i class="mdi mdi-flask link-icon"></i>
        
      </a>
      <ul class="collapse navigation-submenu" id="sample-pages">
        <li>
          <a href="{{url('create-category')}}">Add Card Type</a>
        </li>
        <li>
          <a href="{{url('view-categories')}}">View Card Type</a>
        </li>
      </ul>
    </li>

    <li>
      <a href="#ui-elements" data-toggle="collapse" aria-expanded="false">
        <span class="link-title">Card</span>
        <i class="mdi mdi-bullseye link-icon"></i>
      </a>
      <ul class="collapse navigation-submenu" id="ui-elements">
        <li>
          <a href="{{url('create-product')}}">Add Card</a>
        </li>
        <li>
          <a href="{{url('view-products')}}">View Cards</a>
        </li>

      </ul>
    </li>

    <li>
      <a href="#ui-elements2" data-toggle="collapse" aria-expanded="false">
        <span class="link-title">Orders</span>
        <i class="mdi mdi-bullseye link-icon"></i>
      </a>
      <ul class="collapse navigation-submenu" id="ui-elements2">

        <li>
          <a href="{{url('view-credit-orders')}}">View Credit Orders</a>
        </li>
        
        <li>
          <a href="{{url('view-card-orders')}}">View Card Orders</a>
        </li>

        <!--<li>-->
        <!--  <a href="{{url('view-withdraw-requests')}}">View Withdraw Requests </a>-->
        <!--</li>-->

        <li>
          <a href="{{url('view-load-credit-requests')}}">View Load Credit Requests </a>
        </li>

        <li>
          <a href="{{url('view-card-statement-requests')}}">View Card Statement </a>
        </li>

        <li>
          <a href="{{url('view-delete-card-requests')}}">View Delete Card Request </a>
        </li>

      </ul>
    </li>



  <li>
      <a href="#ui-elementsrole" data-toggle="collapse" aria-expanded="false">
        <span class="link-title">User Role</span>
        <i class="mdi mdi-bullseye link-icon"></i>
      </a>
      <ul class="collapse navigation-submenu" id="ui-elementsrole">
        <li>
          <a href="{{ route('users.index') }}">Manage Users</a>
        </li>
        <li>
          <a href="{{ route('roles.index') }}">Manage Role</a>
        </li>

      </ul>
</li>
    
     <li>
      <a href="{{url('view-documents')}}">
        <span class="link-title">Pending Verification</span>
        <i class="mdi mdi-gauge link-icon"></i>
      </a>
    </li>
    
    <li>
      <a href="{{url('view-send-money')}}">
        <span class="link-title">View Widthdraw Request</span>
        <i class="mdi mdi-gauge link-icon"></i>
      </a>
    </li>
     

  <!-- <li>
    <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
            {{ csrf_field() }}
       </form>
    </li> -->

    <!-- <li>
      <a href="pages/forms/form-elements.html">
        <span class="link-title">Forms</span>
        <i class="mdi mdi-clipboard-outline link-icon"></i>
      </a>
    </li> -->
    
    <!-- <li class="nav-category-divider">DOCS</li>
    <li>
      <a href="../docs/docs.html">
        <span class="link-title">Documentation</span>
        <i class="mdi mdi-asterisk link-icon"></i>
      </a>
    </li> -->
  </ul>
<style type="text/css">
  ul#bottom{
    margin:0px;
    padding:0px;
  }
  ul#bottom li{
    list-style:none;
  }

</style>
<div>
    <ul id="bottom">
      <li>
        <a class="dropdown-item has-icon text-info" href="{{ url('settings') }}"> &nbsp;&nbsp; <i class="mdi mdi-settings"></i>&nbsp; Settings </a>
      </li>
      
      <li>
       <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                     onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">&nbsp;&nbsp;<i class="mdi mdi-logout-variant"></i>&nbsp; 
                       Logout 
                  </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
              {{ csrf_field() }}
         </form>
      </li>
  </ul>
</div>

@else

<ul class="navigation-menu">

    <li>
      <a href="{{url('dashboard')}}">
        <span class="link-title">Dashboard</span>
        <i class="mdi mdi-gauge link-icon"></i>
      </a>
    </li>

    <!-- <li>
      <a href="{{url('/deposit')}}">
        <span class="link-title">Deposit</span>
        <i class="mdi mdi-flask link-icon"></i>
      </a>
    </li> -->

    <!-- <li>
      <a href="{{url('')}}">
        <span class="link-title">Statement</span>
        <i class="mdi mdi-gauge link-icon"></i>
      </a>
    </li> -->


    <li>
      <a class="test" href="{{url('/cards')}}">
        <span class="link-title">Cards</span>
        <i class="mdi mdi-credit-card link-icon"></i>
      </a>
    </li>

    <li>
        <a href="{{url('/view-cards')}}">
          <span class="link-title">List Cards</span>
          
          <i class="mdi mdi-credit-card-multiple link-icon"></i>
        </a>
      </li>

    <li>
      <a href="{{url('payments')}}">
        <span class="link-title">My Payments</span>
        <i class="mdi mdi-bank link-icon"></i>
      </a>
    </li>

</ul>

<!-- <li class="dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Products</span></a>
  <ul class="dropdown-menu {{ Request::is('*') ? 'active' : '' }}" style="display: none;">
  <li><a class="nav-link {{ Request::is('*') ? 'active' : '' }}" href="{{ route('products.index') }}">Manage Product</a></li>
  <li><a class="nav-link" href="{{ route('page_category.index') }}">Page Category</a></li>
  </ul>
</li> -->
<style type="text/css">
  ul#bottom{
    margin:0px;
    padding:0px;
  }
  ul#bottom li{
    list-style:none;
  }

</style>
<div>
    <ul id="bottom">
      <li>
        <a class="dropdown-item has-icon text-info" href="{{ url('settings') }}"> &nbsp; <i style="font-size: 1.1875rem;" class="mdi mdi-settings"></i>&nbsp; Settings </a>
      </li>
      
      <li>
       <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                     onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">&nbsp;&nbsp;<i style="font-size: 1.1875rem;" class="mdi mdi-logout-variant"></i>&nbsp; 
                       Logout 
                  </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
              {{ csrf_field() }}
         </form>
      </li>
  </ul>
</div>

@endhasanyrole


