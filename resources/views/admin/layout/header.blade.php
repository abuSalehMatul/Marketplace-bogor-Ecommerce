<!-- Top Bar Start -->
<div class="topbar">

  <!-- LOGO -->
  <div class="topbar-left">
    <a href="{{ asset('admin/home') }}" class="logo"><span>KCE<span>App</span></span><i class="mdi mdi-layers"></i></a>
    <!-- Image logo -->
    <!--<a href="index.html" class="logo">-->
      <!--<span>-->
        <!--<img src="{{ asset('theme/default/assets/images/logo.png') }}" alt="" height="30">-->
        <!--</span>-->
        <!--<i>-->
          <!--<img src="{{ asset('theme/default/assets/images/logo_sm.png') }}" alt="" height="28">-->
          <!--</i>-->
          <!--</a>-->
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
          <div class="container">

            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left">
              <li>
                <button class="button-menu-mobile open-left waves-effect">
                  <i class="mdi mdi-menu"></i>
                </button>
              </li>

            </ul>

            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">
               @php
                    $u=Auth::user();
                    $user_image=App\User_image::where('user_id',$u->id)->first();
              @endphp
              <li class="dropdown user-box">
                <a href="#" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                  <img src="{{ asset('uploads/admin/'.$user_image->image) }}" alt="user-img" class="img-circle user-img">
                </a>

                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                  <li>
                    @php
                    $u=Auth::user();
                    @endphp
                    <h5>Hi, {{$u->name}}</h5>
                  </li>
                  <li><a href="{{ url('admin/profile') }}"><i class="ti-user m-r-5"></i> Profile</a></li>

                  <li><a style="cursor: pointer;" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {!! csrf_field() !!}
                    </form></li>
                  </ul>
                </li>

              </ul> <!-- end navbar-right -->

            </div><!-- end container -->
          </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
          <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
              <ul>
                <li class="menu-title">Navigation</li>
                <li>
                  <a href="{{ url('admin/home') }}" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Dashboard </span></a>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-cogs"></i> <span> Master </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{  route('country.index') }}">Country</a></li>
                    <li><a href="{{  route('city.index') }}">City</a></li>
                    <li><a href="{{  route('category.index') }}">Product Category</a></li>
                    <li><a href="{{  route('subcategory.index') }}">Product SubCategory</a></li>
                  </ul>
                </li>
             
                <li>
                  <a href="{{ route('sellerplan.index') }}" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Plan </span></a>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> User </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ url('/admin/userlist') }}">All User List</a></li>
                    <li><a href="{{  url('/admin/useractivity') }}">Recent Activity by users</a></li>
                  </ul>
                </li> 
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> Front end Control </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ url('/admin/featured_product_array') }}">Featured Product Image</a></li>
                    <li><a href="{{  url('/admin/stylecontrol') }}">Style Controll</a></li>
                  </ul>
                </li> 
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> Seller </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{  route('sellerlist.index') }}">Seller List</a></li>
                    <li><a href="{{  route('product.index') }}">Product</a></li>
                    <li><a href="{{  url('admin/featured_product') }}">Featured Product List</a></li>
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> Buyer </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{  route('buyerlist.index') }}">Buyer List</a></li>
                    <li><a href="{{  route('buyerpost.index') }}">Post Request</a></li>
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-list"></i> <span> Listing </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ route('listing.index') }}">Sector Category</a></li>
                    <li><a href="{{  route('countrywise.index') }}">Country Wise</a></li>
                    <li><a href="{{ route('sectorwise.index') }}">Sector Wise</a></li>
                  </ul>
                </li>
                <li>
                  <a href="{{ route('community.index') }}" class="waves-effect"><i class="fa  fa-weixin"></i><span> Community </span></a>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-newspaper-o"></i> <span> Business News </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ route('news-category.index') }}">News Category</a></li>
                    <li><a href="{{ route('news.index') }}">News List</a></li>
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-newspaper-o"></i> <span> Blogs </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ route('blogs-category.index') }}">Blogs Category</a></li>
                    <li><a href="{{ route('blogs.index') }}">Blogs List</a></li>
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-weixin"></i> <span> Advertisement </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ url('admin/advertisement/topbanner') }}">Top Banner</a></li>
                    <li><a href="{{ url('admin/advertisement/bottombanner') }}">Bottom Banner</a></li>
                    <li><a href="{{ url('admin/advertisement/sidebarbanner') }}">Sidebar Banner</a></li>
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-money"></i> <span> Purchasing </span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ url('admin/sellerpurchase-list') }}">Seller Plans</a></li>
                    <li><a href="{{ url('admin/sectorpurchase-list') }}">Sector Directory</a></li>
                    <li><a href="{{ url('admin/countrypurchase-list') }}">Country Directory</a></li>
                  </ul>
                </li>
                   <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> Seller Support</span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ route('sellerhelp.index') }}">Help</a></li>
                    <li><a href="{{ route('sellerfaq.index') }}">FAQ</a></li>
                    <li><a href="{{ route('sellersafety.index') }}">Safety </a></li>                 
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> Buyer Support</span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ route('buyerhelp.index') }}">Help</a></li>
                    <li><a href="{{ route('buyerfaq.index') }}">FAQ</a></li>
                    <li><a href="{{ route('buyersafety.index') }}">Safety </a></li>                   
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> Subscription</span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ url('admin/subscriberlist') }}">Subscriber List</a></li>
                    <li><a href="{{ url('admin/subscribersendmessage') }}">Send Message</a></li>
                               
                  </ul>
                </li>
                <li class="has_sub">
                  <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-user"></i> <span> Partnership</span> <span class="menu-arrow"></span></a>
                  <ul class="list-unstyled" style="">
                    <li><a href="{{ url('admin/partnerlist') }}">Partners</a></li>
                    <li><a href="{{ url('admin/addpartner') }}">Add Partner</a></li>
                               
                  </ul>
                </li>
                <li>
                  <a href="{{ route('website-profile.index') }}" class="waves-effect"><i class="fa fa-pencil-square"></i><span> Website Profile </span></a>
                </li>
                <li>
                  <a href="{{ route('website-enquiry.index') }}" class="waves-effect"><i class="fa fa-globe"></i><span> Website Enquiry </span></a>
                </li>
              </ul>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

          </div>
          <!-- Sidebar -left -->

        </div>
            <!-- Left Sidebar End -->