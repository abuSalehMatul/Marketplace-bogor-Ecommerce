<div class="col-md-3">
    <div class="">
        <div class="col-md-12">
            <nav class="navbar navbar-inverse sidebar" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><i class="fa fa-user fa-3x"></i></a><br>
                        <h4>Welcome, {{ $seller->first_name }}</h4>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1 ">
                        <ul class="nav navbar-nav">
                            <li class="{{ setActive('seller/home') }}"><a href="{{ url('seller/home') }}">Dashboard<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-dashboard"></span></a></li>
                            <li class="{{ setActive('seller/sellerprofile') }}"><a href="{{ route('sellerprofile.index') }}">Company Profile<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-plus"></span></a></li>
                            <li class="{{ setActive('seller/profile') }}"><a href="{{ url('seller/profile') }}">Manage My Profile<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-user"></span></a></li>
                            <li class="{{ setActive('seller/password') }}"><a href="{{ url('seller/password') }}">Change Password<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-user"></span></a></li>
                            <li class="{{ setActive('seller/business-matchmatching') }}"><a href="{{ route('business-matchmatching.index') }}">Business Matchmaking<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-briefcase"></span></a></li>
                            <li class="{{ setActive('seller/sellercommunity') }}"><a href="{{ route('sellercommunity.index') }}">Join Community<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-briefcase"></span></a></li>
                            <li class="{{ setActive('seller/enquiry') }}"><a href="{{ url('seller/enquiry') }}">Enquiries<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-inbox"></span></a></li>
                            <li class="{{ setActive('seller/sell') }}"><a href="{{ route('sell.index') }}">My Product<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-buysellads"></span></a></li>
                            <li class="dropdown {{ setActive('seller/topbanner') }}{{ setActive('seller/bottombanner') }}{{ setActive('seller/sidebarbanner') }}">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Banner Advertisement <span class="caret"></span><span style="" class="pull-right hidden-xs showopacity glyphicon fa  fa-adn"></span></a>
                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a href="{{ route('topbanner.index') }}">TOP BANNER</a></li>
                                    <li><a href="{{ route('bottombanner.index') }}">BOTTOM BANNER</a></li>
                                    <li><a href="{{ route('sidebarbanner.index') }}">SIDEBAR BANNER</a></li>

                                </ul>
                            </li>

                            {{-- <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage My Listings</span><span style="" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact List<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-phone"></span></a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Block List<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-user-times"></span></a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact Us</span><span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-tag"></span></a></li> --}}
                            <li><a href="#" chref="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout<span style="" class="pull-right hidden-xs showopacity glyphicon fa fa-sign-out"></span></a> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {!! csrf_field() !!}
                                </form></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>   
    </div>
</div>

@push('footerscript')
<script type="text/javascript">
    $('.navbar-toggle').on('click',function() {
        if($('.collapse').css('display') == 'none')
        {
            $(".collapse").css("display", "block");
        } 
        else{
            $(".collapse").css("display", "none");
        }   
    });
</script>
@endpush