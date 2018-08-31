@extends('public.layout.master')
@section('title', __('user/booking.title'))
@section('content')
<div class="wrap">
  <div class="content_top">
    <div class="back-links">
        <h4>@lang('user/booking.selected')</h4>
    </div>
    <div class="clear"></div>
  </div>
  <div class="summary summary-style-2">
    <div class="row">
      <div class="col-xs-4">
        <div class="movie-img img-background">
            <img src="images/default/default.jpg" id="image">
        </div>
        <p class="title">
          <span id="name_film"></span>
        </p>
      </div>
      <div class="col-xs-3">
        <p>
          <span class="pull-left">@lang('user/booking.date_schedule'): </span>
          <span>
            <span id="date_schedule"></span>
          </span>
        </p>
        <div class="clearfix"></div>
        <p>
          <span class="pull-left">@lang('user/booking.time_schedule'): </span>
          <span>
            <span id="time_schedule"></span>
          </span>
        </p>
        <div class="clearfix"></div>
        <p>
          <span class="pull-left">@lang('user/booking.seat_schedule'): </span>
          <span>
            <span id="seat_name"></span>
          </span>
        </p>
      </div>
      <div class="col-xs-5 dis-flex-row">
        <h3 class="text-bold" id="total">
        </h3>
      </div>
    </div>
  </div>
  <section class="summary summary-style-3">
    <div class="container">
      <div class="row">
        <div class="col-xs-2">
          <a class="pointer" href="#" id="back">
            <p style="color:#000205">@lang('user/booking.back')</p>
          </a>
        </div>
        <div class="col-xs-3">
          <h4>@lang('user/booking.total') <span class="pull-right" id="totalFooter">
          </span>
          </h4>
        </div>
        <div class="col-xs-offset-5 col-xs-2">
          <a class="pointer" href="#" id="submit">
            <p class="text-center">@lang('user/booking.continue')</p>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@section('js')
  <script src="js/public/booking.js"></script>
@endsection