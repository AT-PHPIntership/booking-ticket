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
            <img src="images/default/default.jpg" >
        </div>
        <p class="title">
          <span id="ctl00_plcMain_lblMovieName">Cats And Peachtopia</span>
        </p>
      </div>
      <div class="col-xs-3">
        <p>
          <span class="pull-left">@lang('user/booking.date_schedule'): </span>
          <span>
            <span id="ctl00_plcMain_lblCinemaName">ThanhHoa</span>
          </span>
        </p>
        <div class="clearfix"></div>
        <p>
          <span class="pull-left">@lang('user/booking.time_schedule'): </span>
          <span>
            <span id="ctl00_plcMain_lblScreen">Scm03</span>
          </span>
        </p>
        <div class="clearfix"></div>
        <p>
          <span class="pull-left">@lang('user/booking.seat_schedule'): </span>
          <span>
            <span id="ctl00_plcMain_lblSeat">I3-I4</span>
          </span>
        </p>
      </div>
      <div class="col-xs-5 dis-flex-row">
        <h3 class="text-bold" id="total">
          120.000
          đ
        </h3>
      </div>
    </div>
  </div>
  <section class="summary summary-style-3">
    <div class="container">
      <div class="row">
        <div class="col-xs-2">
          <a class="pointer" href="#">
            <p style="color:#000205">@lang('user/booking.back')</p>
          </a>
        </div>
        <div class="col-xs-3">
          <h4>@lang('user/booking.total') <span class="pull-right" id="totalFooter">
            140,000
            đ</span>
          </h4>
        </div>
        <div class="col-xs-offset-5 col-xs-2">
          <a class="pointer" href="#">
            <p class="text-center">@lang('user/booking.continue')</p>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@section('js')
@endsection