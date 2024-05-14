
  <!-- Page Sidebar Start -->
         <!--================================-->
         <div class="page-sidebar">
            <div class="logo">
               <a class="logo-img" href="index.html">		
               <img class="desktop-logo" src="assets/images/logo.png" alt="">
               <img class="small-logo" src="assets/images/small-logo.png" alt="">
               </a>			
               <a id="sidebar-toggle-button-close"><i class="wd-20" data-feather="x"></i> </a>
            </div>
            <!--================================-->
            <!-- Sidebar Menu Start -->
            <!--================================-->
            <div class="page-sidebar-inner">
               <div class="page-sidebar-menu">
                  <ul class="accordion-menu">
                     <li class="mg-l-20-force mg-t-25-force menu-navigation">Navigation</li>
                     <li>
                        <a href=""><i data-feather="home"></i>
                        <span>Dashboard</span><i class="accordion-icon fa fa-angle-left"></i></a>
                        <ul class="sub-menu">
                           
                          @can("create reseller")
                          <li><a href="/reseller/create">Reseller yarat</a></li>
                          <li><a href="/reseller/get_resellers">Resellerler</a></li>
                          @endcan
                           @can("create subreseller")
                           <li><a href="/subreseller/create">Subreseller yarat</a></li>
                           <li><a href="/reseller/get_subresellers">Subresellerler</a></li>
                           @endcan
                           @can("create line")
                           <li><a href="/reseller/lines/">Istifadeciler</a></li>
                           <li><a href="/reseller/lines/create">Istifadeci yarat</a></li>
                              
                           @endcan
                           
                           <li><a href="/reseller/packages/show">Paketler</a></li>
                           
                        </ul>
                     </li>
                    
                  </ul>
               </div>
            </div>
            <!--/ Sidebar Menu End -->
            <!--================================-->
            <!-- Sidebar Footer Start -->
            <!--================================-->
            <div class="sidebar-footer">									
               <a class="pull-left" href="pages-profile.html" data-toggle="tooltip" data-placement="top" data-original-title="Profile">
               <i data-feather="user" class="wd-16"></i></a>									
               <a class="pull-left " href="mailbox.html" data-toggle="tooltip" data-placement="top" data-original-title="Mailbox">
               <i data-feather="mail" class="wd-16"></i></a>
               <a class="pull-left" href="aut-unlock.html" data-toggle="tooltip" data-placement="top" data-original-title="Lockscreen">
               <i data-feather="lock" class="wd-16"></i></a>
               <a class="pull-left" href="/logout" data-toggle="tooltip" data-placement="top" data-original-title="Sing Out">
               <i data-feather="log-out" class="wd-16"></i></a>
            </div>
            <!--/ Sidebar Footer End -->
         </div>
         <!--/ Page Sidebar End -->
