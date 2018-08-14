<div class="header">
  <div class="headertop_desc">
     <div class="wrap">
        <div class="nav_list">
           <ul>
              <li><a href="#">@lang('user/layout.home')</a></li>
              <li><a href="#">@lang('user/layout.schedule')</a></li>
              <li><a href="#">@lang('user/layout.contact')</a></li>
           </ul>
        </div>
        <div class="account_desc">
           <ul>
              <li><a href="#">@lang('user/layout.login')</a></li>
              <li><a href="#">@lang('user/layout.register')</a></li>
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
     <div class="header_bottom">
        <div class="header_bottom_left">
           <div class="categories">
              <ul>
                 <h3>@lang('user/layout.categories')</h3>
                 <li><a href="#">All</a></li>
                 <li><a href="#">Hindi</a></li>
                 <li><a href="#">Telugu</a></li>
                 <li><a href="#">English</a></li>
                 <li><a href="#">Tamil</a></li>
                 <li><a href="#">Malayalam</a></li>
                 <li><a href="#">Kannada</a></li>
              </ul>
           </div>
        </div>
        <div class="header_bottom_right">
           <!--Slider -->
           <div class="slider">
              <div class="slider-wrapper theme-default">
                 <div id="slider" class="nivoSlider">
                    <img src="images/banner/1.jpg" data-thumb="images/banner/1.jpg" alt="" />
                    <img src="images/banner/2.jpg" data-thumb="images/banner/2.jpg" alt="" />
                    <img src="images/banner/3.jpg" data-thumb="images/banner/3.jpg" alt="" />
                    <img src="images/banner/4.jpg" data-thumb="images/banner/4.jpg" alt="" />
                    <img src="images/banner/5.jpg" data-thumb="images/banner/5.jpg" alt="" />
                 </div>
              </div>
           </div>
           <!--End Slider-->
        </div>
        <div class="clear"></div>
     </div>
  </div>
</div>
