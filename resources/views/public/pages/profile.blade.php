@extends('public.layout.master')
@section('css')
<link href="css/public/main.css" rel="stylesheet" type="text/css" media="all"/>
@endsection
@section('title', __('user/layout.profile'))
@section('content')
<div class="wrap">
  <div class="content">
    <div class="content_top">
      <div class="back-links">
        <h4>@lang('user/layout.profile')</h4>
      </div>
      <div class="clear"></div>
    </div>
    <div class="section group">
    <div class="col span_2_of_3">
        <div class="element-right">
            <div class="teddy-bear">
              <div class="teddy-text">
                <img src="images/admin/avatar/admin.png" alt=""  class="img-responsive">
                <h4></h4>
                <p></p>
              </div>
              <div class="teddy-follow">
                <ul>
                  <li class="folw-h">
                    <img src="images/profile/fb.png" alt=""  class="img-responsive">
                    <p>@lang('user/layout.follows')</p>
                  </li>
                  <li class="folw-r">
                    <img src="images/profile/tw.png" alt=""  class="img-responsive">
                    <p>@lang('user/layout.follows')</p>
                  </li>
                  <div class="clear"></div>
                </ul>
              </div>
            </div>
          </div>
          <div class="element-last">
            <ul class="content">
              <li class="menu">
                <ul>
                  <li class="button"><a href="#">@lang('user/layout.profile')<span class="p-icon"> </span></a></li>
                  <li class="dropdown">
                    <ul class="icon-navigation">
                      <li><a id="name"></a></li>
                      <li><a id="email"></a></li>
                      <li><a id="phone"></a></li>
                      <li><a id="address"></a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="menu">
                <ul>
                  <li class="button"><a href="#">@lang('user/booking.title')<span class="p-icon msg"> </span></a></li>
                  <li class="dropdown" id="booking_schedule">
                    <ul class="icon-navigation">
                      <li><a></a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="clear"></div>
     </div>
     <div class="col span_1_of_3">
        <div class="contact_info">
           <h2>@lang('user/login.find_us_here')</h2>
           <div class="map">
              <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="@lang('user/map.src')">
                </iframe><br><small>
                <a href="@lang('user/map.href')" style="color:#888;text-align:left;font-size:0.85em">@lang('user/login.form.view')</a></small>
           </div>
        </div>
        <div class="company_address">
           <h2>@lang('user/login.information') :</h2>
           <p>@lang('user/login.address'),</p>
           <p>@lang('user/login.street'),</p>
           <p>@lang('user/login.country')</p>
           <p>@lang('user/login.phone'): @lang('user/login.phone_number')</p>
           <p>@lang('user/login.fax'): @lang('user/login.fax_number')</p>
           <p>@lang('user/login.email'): <span><a href="#">info(at)mycompany.com</a></span></p>
           <p>@lang('user/login.follow'): <span><a href="#">@lang('user/login.facebook')</a></span>, <span><a href="#">@lang('user/login.twitter')</a></span></p>
        </div>
     </div>
      </div>
    </div>
</div>
@endsection
@section('js')
<script src="js/public/script.js"></script>
@endsection
