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
               <h3>@lang('user/index.new_film')</h3>
            </div>
         </div>
         <div class="section group" id="new_film">
            
         </div>
         <div class="show_more">
            <a id="next_new" class="next_film" href=""> &gt;&gt;&gt;&gt; </a>
         </div>
         <div class="content_bottom">
            <div class="heading">
               <h3>@lang('user/index.feature_film')</h3>
            </div>
         </div>
         <div class="section group" id="feature_film">
           
         </div>
         <div class="show_more">
            <a id="next_feature" class="next_film" href=""> &gt;&gt;&gt;&gt; </a>
        </div>
      </div>
   </div>
@endsection
@section('js')
 <script src="js/public/film.js"></script>
@endsection
