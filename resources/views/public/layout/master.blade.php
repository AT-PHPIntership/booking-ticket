<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title')</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <base href="{{ asset('') }}">
      <link href="css/public/style.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="css/public/slider.css" rel="stylesheet" type="text/css" media="all"/>
      <script type="text/javascript" src="js/public/jquery-1.9.0.min.js"></script> 
      <script type="text/javascript" src="js/public/move-top.js"></script>
      <script type="text/javascript" src="js/public/easing.js"></script>
      <script type="text/javascript" src="js/public/jquery.nivo.slider.js"></script>
      <script type="text/javascript" src="js/public/main.js"></script>
   </head>
   <body>
      <div class="main">
         @yield('content')
      </div>
      <div class="footer">
         <div class="wrap">
            <div class="section group">
               <div class="col_1_of_4 span_1_of_4">
                  <h4>@lang('user/layout.information')</h4>
                  <ul>
                     <li><a href="#">@lang('user/layout.about')</a></li>
                     <li><a href="#">@lang('user/layout.custom_service')</a></li>
                     <li><a href="#">@lang('user/layout.order_return')</a></li>
                     <li><a href="#">@lang('user/layout.contact_us')</a></li>
                  </ul>
               </div>
               <div class="col_1_of_4 span_1_of_4">
                  <h4>@lang('user/layout.why_buy')</h4>
                  <ul>
                     <li><a href="#">@lang('user/layout.about')</a></li>
                     <li><a href="#">@lang('user/layout.custom_service')</a></li>
                  </ul>
               </div>
               <div class="col_1_of_4 span_1_of_4">
                  <h4>@lang('user/layout.account')</h4>
                  <ul>
                     <li><a href="#">@lang('user/layout.sign_in')</a></li>
                     <li><a href="#">@lang('user/layout.view_cart')</a></li>
                     <li><a href="#">@lang('user/layout.track_order')</a></li>
                     <li><a href="#">@lang('user/layout.help')</a></li>
                  </ul>
               </div>
               <div class="col_1_of_4 span_1_of_4">
                  <h4>@lang('user/layout.contact')</h4>
                  <ul>
                     <li><span>+91-123-456789</span></li>
                     <li><span>+00-123-000000</span></li>
                  </ul>
                  <div class="social-icons">
                     <h4>@lang('user/layout.follow')</h4>
                     <ul>
                        <li><a href="#" target="_blank"><img src="images/icon/facebook.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="images/icon/twitter.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="images/icon/skype.png" alt="" /> </a></li>
                        <li><a href="#" target="_blank"> <img src="images/icon/linkedin.png" alt="" /></a></li>
                        <div class="clear"></div>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copy_right">
               <p>@lang('user/layout.author') <a href="#">@lang('user/layout.page_name')</a> </p>
            </div>
         </div>
      </div>
      <a href="#" id="toTop"><span id="toTopHover"> </span></a>
      @yield('script')
   </body>
</html>
