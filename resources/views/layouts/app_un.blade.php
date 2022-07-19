
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Label - Premium Responsive Bootstrap 4 Admin & Dashboard Template</title>
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
    <link rel="shortcut icon" href="../asssets/images/favicon.ico" />

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

 <body>
        
        @yield('content_un')
        
        

  </body>
</html>