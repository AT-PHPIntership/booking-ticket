<div class="header">
  <div class="headertop_desc">
     <div class="wrap">
        <div class="nav_list">
           <ul>
              <li><a href="{{ route('user.home') }}">@lang('user/layout.home')</a></li>
              <li><a href="#">@lang('user/layout.schedule')</a></li>
              <li><a href="#">@lang('user/layout.contact')</a></li>
           </ul>
        </div>
        <div class="account_desc">
           <ul>
              <li id="login"><a href="{{ route('user.login') }}">@lang('user/layout.login')</a></li>
              <li id="register"><a href="{{ route('user.register') }}">@lang('user/layout.register')</a></li>
              <li id="my-account"><a href="{{ route('user.profile') }}">@lang('user/layout.account')</a></li>
              <li id="logout"><a href="#">@lang('user/layout.logout')</a></li>
           </ul>
        </div>
        <div class="clear"></div>
     </div>
  </div>
  <div class="wrap">
     <div class="header_top">
        <div class="logo">
           <a href="#"><img src="images/icon/logo.png" alt="" /></a>
        </div>
        <div class="header_top_right">
           <div class="search_box">
              <form>
                 <input id="query_search" type="text" placeholder="@lang('user/layout.search')">
                 <input type="submit" value="">
                 <div class="search-hint" id="search-hint"></div>
              </form>
           </div>
           <div class="clear"></div>
        </div>
        <div class="clear"></div>
     </div>
     @yield('slide')
  </div>
</div>
@section('script')
<script src="js/public/logout.js"></script>
<script src="js/public/sidebar.js"></script>
@endsection
