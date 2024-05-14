<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>Form Layout | Avesta - Multipurpose Admin Dashboard Template</title>
      <!-- Main CSS -->	  
      <link type="text/css" rel="stylesheet" href="{{asset("assets/css/style.css")}}"/>
      <!-- Favicon -->	
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
         <!--================================-->
       @include('sidebar')
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            <!--================================-->
            @include('topbar')  
            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
            <div class="page-inner">
               <!-- Wrapper -->
               <div class="wrapper">
                  <!--================================-->
                 @include('breadcrumb')
                  <!--================================-->
                  <!-- Form Layout Start -->
                  <!--================================-->				  
                  {{-- <div class="row clearfix">
                     <div class="col-12">
                        <div class="card mg-b-30">
                           <div class="card-body">
                              <p class="lead mb-0">@yield("")</p>
                           </div>
                        </div>
                     </div>
                  </div> --}}
                  <div class="row clearfix">
                     @yield("content")
            </div>
            <!--/ Page Inner End -->
            <!--================================-->
            <!-- Page Footer Start -->	
            <!--================================-->
            <footer class="page-footer">
               <div class="pd-t-4 pd-b-0 pd-x-20">
                  <div class="tx-10 tx-uppercase tx-gray-500 tx-spacing-1">
                     <p class="pd-y-10 mb-0">Copyright&copy; 2021 |  Created By  <a href="https://wrapcoders.xyz/avesta" target="_blank">WRAPCODERS</a></p>
                  </div>
               </div>
            </footer>
            <!--/ Page Footer End -->		
         </div>
         <!--/ Page Content End -->
      </div>
      <!--/ Page Container End -->
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->	
      <a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      <!--/ Scroll To Top End -->
      <!--================================-->
      <!-- Template Customizer Start-->
      <!--================================-->		  
      <div class="avesta-settings">
         <a id="avestaSettingsShow" href="" class="avesta-settings-link"><i data-feather="settings" class="wd-20"></i></a>
         <div class="avesta-settings-body">
            <div class="pd-y-20">
               <img src="assets/images/logo-dark.png" class="d-block" alt="">
               <span class="tx-sans tx-10 tx-uppercase tx-medium tx-spacing-1">Template Customizer</span>
            </div>
            <div class="pd-y-20 bd-t">
               <label class="tx-10 tx-uppercase tx-bold tx-spacing-1 mg-b-15">Skin Mode</label>
               <div class="row">
                  <div class="col-12 d-flex justify-content-between">			
                     <span class="avesta-demo-customizer-name tx-spacing-1">Default Skin</span>
                     <a href="" class="avesta-mode avesta-mode-default active" data-title="default-skin"></a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Light Skin</span>
                     <a href="" class="avesta-mode avesta-mode-light" data-title="light-skin">
                     <span class="demo-color-palet-1"></span>
                     <span class="demo-color-palet-2"></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name tx-spacing-1">Cool Skin</span>
                     <a href="" class="avesta-mode avesta-mode-cool" data-title="cool-skin">
                     <span class="bg-primary op-1"></span>
                     <span class="bg-primary op-2"></span>
                     </a>
                  </div>
                  <!-- row -->
               </div>
            </div>
            <div class="pd-y-20 bd-t">
               <label class="tx-10 tx-uppercase tx-bold tx-spacing-1 mg-b-15">Navigation Skin</label>
               <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Default</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-default active" data-title="default">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Light</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-light" data-title="light">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Blue Purple</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-bluepurple" data-title="bluepurple">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Gradient</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-gradient" data-title="gradient">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
               </div>
               <!-- row -->
            </div>
            <div class="pd-y-20 bd-t">
               <label class="tx-10 tx-uppercase tx-bold tx-spacing-1 mg-b-15">Font Family Mode</label>
               <div class="row font-customize">
                  <div class="col-12">
                     <a href="" id="setFontBase" class="active-font">IBM Plex Sans</a>
                  </div>
                  <!-- col -->
                  <div class="col-12">
                     <a href="" id="setFontRoboto">Roboto</a>
                  </div>
                  <!-- col -->
                  <div class="col-12">
                     <a href="" id="setFontPoppins">Poppins</a>
                  </div>
                  <!-- col -->
                  <div class="col-12">
                     <a href="" id="setFontOpenSans">Open Sans</a>
                  </div>
                  <!-- col -->
               </div>
               <!-- row -->
            </div>
         </div>
         <!-- avesta-settings-body -->
      </div>
      <!--/ Template Customizer End -->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <script src="{{asset("assets/plugins/jquery/jquery.min.js")}}"></script>
      <script src="{{asset("assets/plugins/jquery-ui/jquery-ui.js")}}"></script>
      <script src="{{asset("assets/plugins/popper/popper.js")}}"></script>
      <script src="{{asset("assets/plugins/feather/feather.min.js")}}"></script>
      <script src="{{asset("assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
      <script src="{{asset("assets/plugins/typeahead/typeahead.js")}}"></script>
      <script src="{{asset("assets/plugins/typeahead/typeahead-active.js")}}"></script>
      <script src="{{asset("assets/plugins/pace/pace.min.js")}}"></script>
      <script src="{{asset("assets/plugins/slimscroll/jquery.slimscroll.min.js")}}"></script>
      <script src="{{asset("assets/plugins/highlight/highlight.min.js")}}"></script>
      <!-- Required Script -->
      <script src="{{asset("assets/js/app.js")}}"></script>
      <script src="{{asset("assets/js/avesta.js")}}"></script>
      <script src="{{asset("assets/js/avesta-customizer.js")}}"></script>
   </body>
</html>