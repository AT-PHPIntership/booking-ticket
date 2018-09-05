@extends('public.layout.master')
@section('title', __('user/booking.title'))
@section('content')
<div class="wrap">
   <div class="content">
      <div class="content_top">
         <div class="seat-wrap">
            <div class="seat-count-box">
               <h4 class="pull-left">@lang('user/booking.please_choose_number')</h4>
               <select name="quantity" id="quantity" class="ddl-seat-count">
                  <option selected value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
               </select>
               <br>
               <span class="delimeter-line"></span>
               <div class="seat-selection-box">
                  <div>
                     <div class="title-film">
                        <span>@lang('user/booking.film'): <b style="text-transform: uppercase" id="name_film"</b></span>
                     </div>
                     <div class="title-film">
                        <span>@lang('user/booking.date'): <b id="date_schedule"></b></span>
                     </div>
                     <div class="title-film">
                        <span>@lang('user/booking.schedule'): <b id="time_schedule"></b></span>
                     </div>
                  </div>
                  <div class="title-film">
                     <span>@lang('user/booking.total_seat'):<b>
                     <span id="num_of_seat" data-seattotallabel="">0</span></b></span>
                  </div>
                  <div class="title-film">
                     <span>@lang('user/booking.total_price'): <b>
                     <span id="total_price" data-totalprice="">0</span></b></span>
                  </div>
                  <div style="clear: both"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="content_top">
         <div>
            <h3 style="font-size: 25px; color: red">@lang('user/booking.booking_close') <span id="time"></span> @lang('user/booking.minutes')!</h3>
         </div>
      </div>
      <div class="div-seat-booing" id="sodoghe">
         <strong class="screen_tit">
         <font>
         <font class="">@lang('user/booking.screem')</font>
         </font>
         </strong>
         <div id="seat_booking">
          
         </div>
        </div>
      <div class="container">
         <span class="delimeter-line"></span>
         <div class="content-type">
            <div class="div-seat">
               <ul>
                  <li class="item-seat"></li>
                  <li class="content-booked">:
                    @lang('user/booking.empty_seat')
                  </li>
               </ul>
               <div class="clear">
               </div>
            </div>
            <div class="div-seat">
               <ul>
                  <li class="item-seat-booked"></li>
                  <li class="content-booked">:
                    @lang('user/booking.selected_seat')
                  </li>
               </ul>
               <div class="clear">
               </div>
            </div>
            <div class="div-seat">
               <ul>
                  <li class="item-seat-selected-show"></li>
                  <li class="content-booked">:
                    @lang('user/booking.selecting_seat')
                  </li>
               </ul>
               <div class="clear">
               </div>
            </div>
            <div style="clear: both">
            </div>
         </div>
      </div>
      <section class="step-2-navigator">
         <div class="container back-and-forward">
            <div class="row">
               <div class="col-xs-12">
                  <a id="btnChangeTime" class="pull-left btn-changeschedule">@lang('user/booking.back')</a>
                  <a id="btnNext" class="pull-right btn-continue">@lang('user/booking.continue')</a>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
@endsection
@section('js')
<script src="js/public/order.js"></script>
@endsection
