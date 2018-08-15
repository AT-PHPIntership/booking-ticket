@extends('public.layout.master')
@section('title', __('user/title.title.login'))
@include('public.layout.top')
@section('content')
<div class="wrap">
   <div class="content">
      <div class="content_top">
         <div class="back-links">
            <h4>@lang('user/title.title.login')</h4>
         </div>
         <div class="clear"></div>
      </div>
      <div class="section group">
         <div class="col span_2_of_3">
            <div class="contact-form">
               <h2>@lang('user/login.login_form')</h2>
               <form method="post" action="contact-post.html">
                  <div>
                     <span><label>@lang('user/login.form.email')</label></span>
                     <span><input name="email" type="text" class="textbox" placeholder="@lang('user/login.form.email_hint')" required=" "></span>
                  </div>
                  <div>
                     <span><label>@lang('user/login.form.password')</label></span>
                     <span><input name="password" type="password" class="textbox" placeholder="@lang('user/login.form.password_hint')" required=" "></span>
                  </div>
                  <div>
                    <a href="">{{ __('user/login.form.forgot_password') }}</a>
                  </div>
                  <div>
                     <span><input type="submit" value="@lang('user/login.form.login')" class="mybutton"></span>
                  </div>
               </form>
            </div>
         </div>
         <div class="col span_1_of_3">
            <div class="contact_info">
               <h2>@lang('user/login.find_us_here')</h2>
               <div class="map">
                  <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed">
                    </iframe><br><small>
                    <a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#888;text-align:left;font-size:0.85em">@lang('user/login.form.view')</a></small>
               </div>
            </div>
            <div class="company_address">
               <h2>@lang('user/login.information') :</h2>
               <p>@lang('user/login.address'),</p>
               <p>@lang('user/login.street'),</p>
               <p>@lang('user/login.country')</p>
               <p>@lang('user/login.phone'):(00) 222 666 444</p>
               <p>@lang('user/login.fax'): (000) 000 00 00 0</p>
               <p>@lang('user/login.email'): <span><a href="#">info(at)mycompany.com</a></span></p>
               <p>@lang('user/login.follow'): <span><a href="#">Facebook</a></span>, <span><a href="#">Twitter</a></span></p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
