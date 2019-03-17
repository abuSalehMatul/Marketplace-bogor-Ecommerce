@php ($row=CommonClass::WebsiteProfile())
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 top-message">
                <p>Call: {{ $row->phone_no }}</p>
            </div>
            <div class="col-md-6 top-links">
                <ul class="listnone">
                    <li><a href="{{ url('support') }}"> Support </a></li>
                    @guest
                    <li><a href="#" data-toggle="modal" data-target="#exampleModal">Register</a></li>
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    @else
                    @role('seller')
                     <li><a href="{{ url('seller/home') }}">My Account</a></li>
                    @else
                    <li><a href="{{ url('buyer/home') }}">My Account</a></li>
                    @endrole
                    <li>
                        
                        <a style="cursor: pointer;" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                        @endif
                    </ul>
                </div>
            </div>
           {{--  @include('layout.topad') --}}
        </div>
    </div>
    <div class="header">
        <div class="container">
            
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-3 logo">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}"><img src="{{ asset($row->logo) }}" alt="Wedding Vendors" class="img-responsive" style="height: 50px"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-9">
                    <div data-ride="carousel">
                    <!-- Wrapper for slides -->
                  </div>
                    <div >
                        <ul class="exo-menu">
                            <li class="active"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="mega-drop-down"><a href="#">Suppliers</a>
                                <div class="animated fadeIn mega-menu">
                                    <div class="mega-menu-wrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="row mega-title">Browse Suppliers</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="stander li25">
                                                    @foreach(CommonClass::category() as  $catrow)
                                                    <li><a href="{{ url("search?search=seller-in-africa&category=$catrow->category_slug") }}">{{ $catrow->category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </li>
                            <li class="mega-drop-down"><a href="#">Buyers</a>
                                <div class="animated fadeIn mega-menu">
                                    <div class="mega-menu-wrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="row mega-title">Browse Buyers</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="stander li25">
                                                    @foreach(CommonClass::category() as  $catrow)
                                                    <li><a href="{{ url("search?search=buyer-in-africa&category=$catrow->category_slug") }}">{{ $catrow->category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </li>
                            <li class="drop-down"><a href="#">Featured</a>
                                <!--Drop Down-->
                                <ul class="drop-down-ul animated fadeIn">
                                    <li><a href="{{ url("featured-products") }}">Feature Products</a></li>
                                    <li><a href="{{ url("featured-suppliers") }}">Feature Suppliers</a></li>
                                   
                                </li>
                            </ul>
                        </li>
                        <li ><a href="#" data-toggle="modal" data-target="#directoryModal">Download Directory</a>
                            <div class="animated fadeIn mega-menu">
                                <div class="mega-menu-wrap">
                                    <div class="row">
                                        <div class="col-sm-4">
                                           <h4 class="row mega-title">Sector Wise</h4>
                                           <ul class="stander">
                                                @foreach(CommonClass::GetSector() as  $crow)
                                                <li><a href="{{ url("sectors-directory/$crow->sector_slug") }}"><img src="{{ asset($crow->image) }}" width="20"> {{ $crow->sector_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                             <h4 class="row mega-title">Country Wise</h4>
                                            <ul class="stander li33">
                                                @foreach(CommonClass::GetCountry() as  $crow)
                                                <li><a href="{{ url("countries-directory/$crow->country_slug") }}"><img src="{{ asset($crow->country_flag) }}" width="20"> {{ $crow->country_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </li>
                        <li class="drop-down"><a href="#">News</a>
                                <!--Drop Down-->
                                <ul class="drop-down-ul animated fadeIn">
                                    <li><a href="{{ url("business-news") }}">Business News</a></li>
                                    <li><a href="{{ url("blogs") }}">Blog</a></li>
                                </li>
                            </ul>
                        </li>
                        <a href="#" class="toggle-menu visible-xs-block">|||</a> 
                    </ul>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="directoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Download Directory</h4>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-6 center-block">
                <a href="#" class="btn btn-info btn-md center-block" data-toggle="modal" data-target="#sectorModal"><i class="fa fa-home fa-4x"></i><br>Sector Wise</a>
            </div>
            <div class="col-md-6 center-block">
                <a href="" class="btn btn-primary btn-md center-block" data-toggle="modal" data-target="#countryModal"><i class="fa fa-globe fa-4x"></i><br>Country Wise</a>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="sectorModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Download Industry wise directory</h4>
      </div>
      <div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
             <ul class="dir-ul li32">
                @foreach(CommonClass::GetSector() as  $crow)
                <li><a href="{{ url("sectors-directory/$crow->sector_slug") }}"><img src="{{ asset($crow->image) }}" width="20"> {{ $crow->sector_name }}</a></li>
                @endforeach
            </ul>
        </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="countryModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Download Country wise directory</h4>
      </div>
      <div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
             <ul class="dir-ul li32">
                @foreach(CommonClass::GetCountry() as  $crow)
                <li><a href="{{ url("countries-directory/$crow->country_slug") }}"><img src="{{ asset($crow->country_flag) }}" width="20"> {{ $crow->country_name }}</a></li>
                @endforeach
            </ul>
        </div>
        </div>
      </div>
    </div>

  </div>
</div>