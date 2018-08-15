@extends('public.layout.master')
@section('title', __('user/title.title.register'))
@include('public.layout.top')
@section('content')
<div class="wrap">
   <div class="content">
      <div class="content_top">
         <div class="back-links">
            <h4>@lang('user/title.title.register')</h4>
         </div>
         <div class="clear"></div>
      </div>
      <div class="section group">
         <div class="col span_2_of_3">
            <div class="contact-form">
               <h2>@lang('user/login.register_form')</h2>
               <form method="post" action="">
                  <div>
                     <span><label>@lang('user/login.form.email')</label></span>
                     <span><input name="email" type="text" class="textbox" placeholder="@lang('user/login.form.email_hint')" required=" "></span>
                  </div>
                  <div>
                    <span><label>@lang('user/login.form.full_name')</label></span>
                    <span><input name="full_name" type="text" class="textbox" placeholder="@lang('user/login.form.full_name_hint')" required=" "></span>
                 </div>
                 <div>
                    <span><label>@lang('user/login.form.password')</label></span>
                    <span><input name="password" type="password" class="textbox" placeholder="@lang('user/login.form.password_hint')" required=" "></span>
                  </div>
                  <div>
                     <span><label>@lang('user/login.form.repassword')</label></span>
                     <span><input name="repassword" type="password" class="textbox" placeholder="@lang('user/login.form.repassword_hint')" required=" "></span>
                  </div>
                  <div>
                     <span><input type="submit" value="@lang('user/login.form.register')" class="mybutton"></span>
                  </div>
               </form>
            </div>
         </div>
         <div class="col span_1_of_3">
            <div class="contact_info">
               <h2>@lang('user/login.find_us_here')</h2>
               <div class="map">
                  <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="@lang('user/map.src')">
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
