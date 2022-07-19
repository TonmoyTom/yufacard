
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Yufacard - Digital Wallet | Virtual Visa Mastercard Payments World Wide</title</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_asset/assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin_asset/assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('admin_asset/assets/css/demo_1/style.css')}}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{asset('front_end/images/ico/favicon.png')}}">

    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>

  </head>
  <body class="header-fixed">

    <style type="text/css">
      .sidebar .user-profile {
       padding:0px !important;
     }
     
    .sidebar .navigation-menu li.active a .link-title {
    color:unset !important;
    }
    .sidebar .navigation-menu li.active a .link-icon {
    color: unset !important;
   }

  /*.visited2{
    background:#4cceac69;
  }*/

  .page-body .page-content-wrapper{
    margin-top: 7px !important;
  }
  
  /*Header admin off sticky option*/
  .page-body .page-content-wrapper .page-content-wrapper-inner .viewport-header{
      position:unset !important;
  }
  
  .sidebar .navigation-menu li.nav-category-divider{
      position:unset !important;
  }
  
  @media (max-width: 767.98px)
.page-body .page-content-wrapper {
    padding:0 !important; 
}

  </style>

    <!-- partial:partials/_header.html -->
     <nav class="t-header d-xl-none">
      <!--<div class="t-header-brand-wrapper">-->
      <!--  <a href="index.html">-->
      <!--    <img class="logo" src="http://localhost:8000/admin_asset/assets/images/logo.svg" alt="">-->
      <!--    <img class="logo-mini" src="http://localhost:8000/admin_asset/assets/images/logo_mini.svg" alt="">-->
      <!--  </a>-->
      <!--</div>-->
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          <form action="#" class="t-header-search-box">
            <div class="input-group">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" autocomplete="off">
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form>
          
          <ul class="nav ml-auto">
            <!--<li class="nav-item dropdown">-->
            <!--  <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" aria-expanded="false">-->
            <!--    <i class="mdi mdi-bell-outline mdi-1x"></i>-->
            <!--  </a>-->
            <!--  <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">-->
            <!--    <div class="dropdown-header">-->
            <!--      <h6 class="dropdown-title">Notifications</h6>-->
            <!--      <p class="dropdown-title-text">You have 4 unread notification</p>-->
            <!--    </div>-->
            <!--    <div class="dropdown-body">-->
            <!--      <div class="dropdown-list">-->
            <!--        <div class="icon-wrapper rounded-circle bg-inverse-primary text-primary">-->
            <!--          <i class="mdi mdi-alert"></i>-->
            <!--        </div>-->
            <!--        <div class="content-wrapper">-->
            <!--          <small class="name">Storage Full</small>-->
            <!--          <small class="content-text">Server storage almost full</small>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="dropdown-list">-->
            <!--        <div class="icon-wrapper rounded-circle bg-inverse-success text-success">-->
            <!--          <i class="mdi mdi-cloud-upload"></i>-->
            <!--        </div>-->
            <!--        <div class="content-wrapper">-->
            <!--          <small class="name">Upload Completed</small>-->
            <!--          <small class="content-text">3 Files uploded successfully</small>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="dropdown-list">-->
            <!--        <div class="icon-wrapper rounded-circle bg-inverse-warning text-warning">-->
            <!--          <i class="mdi mdi-security"></i>-->
            <!--        </div>-->
            <!--        <div class="content-wrapper">-->
            <!--          <small class="name">Authentication Required</small>-->
            <!--          <small class="content-text">Please verify your password to continue using cloud services</small>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="dropdown-footer">-->
            <!--      <a href="#">View All</a>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</li>-->
            <!--<li class="nav-item dropdown">-->
            <!--  <a class="nav-link" href="#" id="messageDropdown" data-toggle="dropdown" aria-expanded="false">-->
            <!--    <i class="mdi mdi-message-outline mdi-1x"></i>-->
            <!--    <span class="notification-indicator notification-indicator-primary notification-indicator-ripple"></span>-->
            <!--  </a>-->
            <!--  <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="messageDropdown">-->
            <!--    <div class="dropdown-header">-->
            <!--      <h6 class="dropdown-title">Messages</h6>-->
            <!--      <p class="dropdown-title-text">You have 4 unread messages</p>-->
            <!--    </div>-->
            <!--    <div class="dropdown-body">-->
            <!--      <div class="dropdown-list">-->
            <!--        <div class="image-wrapper">-->
            <!--          <img class="profile-img" src="http://localhost:8000/admin_asset/assets/images/profile/male/image_1.png" alt="profile image">-->
            <!--          <div class="status-indicator rounded-indicator bg-success"></div>-->
            <!--        </div>-->
            <!--        <div class="content-wrapper">-->
            <!--          <small class="name">Clifford Gordon</small>-->
            <!--          <small class="content-text">Lorem ipsum dolor sit amet.</small>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="dropdown-list">-->
            <!--        <div class="image-wrapper">-->
            <!--          <img class="profile-img" src="http://localhost:8000/admin_asset/assets/images/profile/female/image_2.png" alt="profile image">-->
            <!--          <div class="status-indicator rounded-indicator bg-success"></div>-->
            <!--        </div>-->
            <!--        <div class="content-wrapper">-->
            <!--          <small class="name">Rachel Doyle</small>-->
            <!--          <small class="content-text">Lorem ipsum dolor sit amet.</small>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="dropdown-list">-->
            <!--        <div class="image-wrapper">-->
            <!--          <img class="profile-img" src="http://localhost:8000/admin_asset/assets/images/profile/male/image_3.png" alt="profile image">-->
            <!--          <div class="status-indicator rounded-indicator bg-warning"></div>-->
            <!--        </div>-->
            <!--        <div class="content-wrapper">-->
            <!--          <small class="name">Lewis Guzman</small>-->
            <!--          <small class="content-text">Lorem ipsum dolor sit amet.</small>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="dropdown-footer">-->
            <!--      <a href="#">View All</a>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</li>-->
            
            <!--<li class="nav-item dropdown">-->
            <!--  <a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown" aria-expanded="false">-->
            <!--    <i class="mdi mdi-apps mdi-1x"></i>-->
            <!--  </a>-->
            <!--  <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">-->
            <!--    <div class="dropdown-header">-->
            <!--      <h6 class="dropdown-title">Apps</h6>-->
            <!--      <p class="dropdown-title-text mt-2">Authentication required for 3 apps</p>-->
            <!--    </div>-->
            <!--    <div class="dropdown-body border-top pt-0">-->
            <!--      <a class="dropdown-grid">-->
            <!--        <i class="grid-icon mdi mdi-jira mdi-2x"></i>-->
            <!--        <span class="grid-tittle">Jira</span>-->
            <!--      </a>-->
            <!--      <a class="dropdown-grid">-->
            <!--        <i class="grid-icon mdi mdi-trello mdi-2x"></i>-->
            <!--        <span class="grid-tittle">Trello</span>-->
            <!--      </a>-->
            <!--      <a class="dropdown-grid">-->
            <!--        <i class="grid-icon mdi mdi-artstation mdi-2x"></i>-->
            <!--        <span class="grid-tittle">Artstation</span>-->
            <!--      </a>-->
            <!--      <a class="dropdown-grid">-->
            <!--        <i class="grid-icon mdi mdi-bitbucket mdi-2x"></i>-->
            <!--        <span class="grid-tittle">Bitbucket</span>-->
            <!--      </a>-->
            <!--    </div>-->
            <!--    <div class="dropdown-footer">-->
            <!--      <a href="#">View All</a>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</li>-->
          </ul> 
        </div>
      </div>
    </nav>
      
    </nav> 
    
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        @include('admin.includes.menu')
      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        
        @yield('content')
        
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer" style="margin-top:15px;">
          <div class="row" style="overflow: hidden;
    clear: both;
    display: block;">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
             
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <center <small class="text-muted d-block">Copyright © 2020-2021 YufaCard All rights reserved</small>

            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
    
<script type="text/javascript">
 $(document).ready(function() {

  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var currurl = window.location;
    // var currurl = window.location.pathname;
    // alert(currurl);
     var val=$('li:has(a[href="'+currurl+'"])').addClass('visited2');
      // $('.test').removeClass('visited2');
      // $(elm).addClass("visited2");
       // $('li a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('visited2');

    });

   
</script>


    <script src="{{asset('admin_asset/assets/js/template.js')}}" type="text/javascript"></script>

    <script src="{{asset('admin_asset/assets/js/dashboard.js')}}" type="text/javascript"></script>

    <script src="{{asset('admin_asset/assets/vendors/js/core.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  </body>
</html>