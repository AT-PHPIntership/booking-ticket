@extends('public.layout.master')
@section('title', __('user/title.title.detail'))
@section('content')
<div class="wrap">
  <div class="content_top">
    <div class="back-links">
      <h4>@lang('user/title.title.detail')</h4>
    </div>
    <div class="clear"></div>
  </div>
  <div class="section group">
  <div class="cont-desc span_1_of_2">
    <div class="product-details">				
    <div class="grid images_3_of_2" id="image">
    </div>
  <div class="desc span_3_of_2">
    <h2 id="name_film"></h2>
    <p id="description"></p>			
    <div class="price">
      <p>@lang('user/detail.price'): <span id="price"></span></p>
    </div>
    <div class="available">
      <ul>
        <li><span>@lang('user/detail.category'):</span> &nbsp; <span style="color: #FC7D01" id="category"></span></li>
        <li><span>@lang('user/detail.duration'):</span> &nbsp; <span style="color: #FC7D01" id="duration"></span></li>
        <li><span>@lang('user/detail.actor'):</span> &nbsp; <span style="color: #FC7D01" id="actor"></span></li>
        <li><span>@lang('user/detail.director'):</span> &nbsp; <span style="color: #FC7D01" id="director"></span></li>
        <li><span>@lang('user/detail.start_date'):</span>&nbsp; <span style="color: #FC7D01" id="start_date"></span></li>
        <li><span>@lang('user/detail.end_date'):</span>&nbsp; <span style="color: #FC7D01" id="end_date"></span></li>
      </ul>
    </div>
</div>
<div class="clear"></div>
</div>
<div class="product_desc">	
 <h2>@lang('user/detail.detail') :</h2>
   <p id="describe"></p>
</div>
<div class="product_desc">	
  <h2>@lang('user/detail.schedule') :</h2>
 </div>
<div class="page-showtimes">
<div id="sessiontimes" class="schedule-block-wrapper">
  
</div>
</div>
  </div>
  <div class="rightsidebar span_3_of_1 sidebar">
    <h2>@lang('user/detail.new_film')</h2>
      <div id="new_films">
      </div>
  </div>
  </div>
</div>
@endsection
@section('js')
  <script src="js/public/detail.js"></script>
@endsection
