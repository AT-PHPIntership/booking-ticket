@extends('public.layout.master')
@section('title', __('user/title.title.index'))
@section('slide')
    @include('public.layout.header')
@endsection
@section('content')
   <div class="wrap">
      <div class="content">
         <div class="content_top">
            <div class="heading">
               <h3 id="film_category">@lang('user/index.collection')</h3>
            </div>
         </div>
         <div class="section group" id="collect_film">
            
         </div>
         <div class="show_more">
            <a id="next_new" class="next_film" href=""> &gt;&gt;&gt;&gt; </a>
         </div>
         <div class="content_bottom">
            <div class="heading">
               <h3>@lang('user/index.event')</h3>
            </div>
         </div>
        <div class="w3-content" style="max-width:100%">
            <img class="mySlides" src="images/banner/banner1.jpg" style="width:100%">
            <img class="mySlides" src="images/banner/banner2.png" style="width:100%">
            <img class="mySlides" src="images/banner/banner3.jpg" style="width:100%">
            <img class="mySlides" src="images/banner/banner4.jpg" style="width:100%">
        </div>
</div>
@endsection
@section('js')
 <script src="js/public/film.js"></script>
@endsection
