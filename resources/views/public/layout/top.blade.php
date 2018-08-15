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
              <li><a href="{{ route('user.login') }}">@lang('user/layout.login')</a></li>
              <li><a href="{{ route('user.register') }}">@lang('user/layout.register')</a></li>
              <li><a href="#">@lang('user/layout.checkout')</a></li>
              <li><a href="#">@lang('user/layout.account')</a></li>
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
           <div class="cart">
              <p><span>@lang('user/layout.cart')</span>
              <div id="dd" class="wrapper-dropdown-2">
                 (@lang('user/layout.empty'))
                 <ul class="dropdown">
                    <li>@lang('user/layout.empty_movie')</li>
                 </ul>
              </div>
              </p>
           </div>
           <div class="search_box">
              <form>
                 <input type="text" placeholder="@lang('user/layout.search')">
                 <input type="submit" value="">
              </form>
           </div>
           <div class="clear"></div>
        </div>
        <div class="clear"></div>
     </div>
     @yield('slide')
  </div>
</div>
