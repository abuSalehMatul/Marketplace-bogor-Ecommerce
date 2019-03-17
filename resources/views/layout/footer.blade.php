@php ($webrow=CommonClass::WebsiteProfile())
    <!-- /. Call to action -->
    <div class="footer">
        <!-- Footer -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 ft-link">
                    <h2>Useful links</h2>
                        <ul>
                            <li><a href="{{ url('searchfor?listof=seller-in-africa') }}">Africa Sellers</a></li>
                            <li><a href="{{ url('searchfor?listof=seller-in-global') }}">Global Sellers</a></li>
                            <li><a href="{{ url('searchfor?listof=buyer-in-africa') }}">Africa Buyers</a></li>
                            <li><a href="{{ url('searchfor?listof=buyer-in-global') }}">Global Buyers</a></li>
                            <li><a href="{{ url('diretory-list') }}">Download Directory</a></li>
                            <li><a href="{{ url('business-news') }}">Business News</a></li>
                            <li><a href="{{ url('blogs') }}">Blogs</a></li>
                        </ul>
                </div>
                 <div class="col-md-3 ft-link">
                        <h2>Featured</h2>
                        <ul>
                           <li><a href="{{ url("featured-products") }}">Feature Products</a></li>
                                    <li><a href="{{ url("featured-suppliers") }}">Feature Suppliers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 ft-link">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="{{ url('about-us') }}">About Us</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                            <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ url('terms-conditions') }}">Terms of Use</a></li>
                            <li><a href="{{ url('support') }}"> Support </a></li>
                        </ul>
                    </div>
                   
                    <div class="col-md-4 newsletter">
                        <h2>Subscribe for Newsletter</h2>
                        <form action="{{url('/subscribed_email')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter E-Mail Address" name="subscribed_email" required>
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-default" type="button" value="Submit">
                                </span> 
                            </div>
                                <!-- /input-group -->
                                <!-- /.col-lg-6 -->
                        </form>
                            <div class="social-icon">
                                <h2>Be Social &amp; Stay Connected</h2>
                                <ul>
                                    
                                    <li><a href="{{ $webrow->fb_url }}" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href="{{ $webrow->twitter_url }}" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                    <li><a href="{{ $webrow->gplus_url }}" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                    <li><a href="{{ $webrow->inst_url }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{ $webrow->youtube_url }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Footer -->
            <div class="tiny-footer">
                <!-- Tiny footer -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">Copyright © 2018. All Rights Reserved.  <br> &nbsp;Developed by <a style="color: #fff;" href="https://salehmatul.com/" target="_blank">Mtech</a></div>
                    </div>
                </div>
            </div>
            <!-- /. Tiny Footer -->
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="{{ asset('webtheme/js/jquery.min.js') }}"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="{{ asset('webtheme/js/bootstrap.min.js') }}"></script>
            <!-- Flex Nav Script -->
            <script src="{{ asset('webtheme/js/jquery.flexnav.js') }}" type="text/javascript"></script>
            <script src="{{ asset('webtheme/js/navigation.js') }}"></script>
            <!-- slider -->
            <script src="{{ asset('webtheme/js/owl.carousel.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('webtheme/js/slider.js') }}"></script>
            <!-- testimonial -->
            <script type="text/javascript" src="{{ asset('webtheme/js/testimonial.js') }}"></script>
            <!-- sticky header -->
            <script src="{{ asset('webtheme/js/jquery.sticky.js') }}"></script>
            <script src="{{ asset('webtheme/js/header-sticky.js') }}"></script>
            <script src="{{ asset('custom/mega-menu.js') }}"></script>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Register</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 center-block">
                                    <a href="{{  url('seller-register') }}" class="btn btn-info btn-md center-block"><i class="fa fa-user fa-4x"></i><br>Seller</a>
                                </div>
                                <div class="col-md-6 center-block">
                                    <a href="{{  url('buyer-register') }}" class="btn btn-primary btn-md center-block"><i class="fa fa-user fa-4x"></i><br>Buyer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                $(function () {
                   $('.toggle-menu').click(function(){
                    $('.exo-menu').toggleClass('display');
                    
                });
                   
               });
           </script>
           <script type="text/javascript">
    $(document).ready(function(){
        $("#topcarosil").carousel({
            interval : 3000,
            pause: false
        });
        $("#footercarosil").carousel({
            interval : 4000,
            pause: false
        });
        $("#sidebanner1").carousel({
            interval : 2000,
            pause: false
        }); 
        $("#sidebanner2").carousel({
            interval : 3000,
            pause: false
        });
        $("#sidebanner3").carousel({
            interval : 5000,
            pause: false
        });
    });
</script>
<script type="text/javascript">
  window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
  d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
  _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
  $.src='//v2.zopim.com/?5RULEaSMmiIObbxZ0RNR52cs4kkctTBT';z.t=+new Date;$.
  type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
  </script><script>$zopim( function() {
})</script>