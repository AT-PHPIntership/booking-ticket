@extends('admin.layout.master')
@section('title', __('home.title'))
@section('content')
<div class="app-title">
   <div>
      <h1><i class="fa fa-dashboard"></i> {{ __('home.home') }}</h1>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">{{ __('home.home') }}</a></li>
   </ul>
</div>
<div class="row">
   <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon">
        <a href="{{ route('admin.users.index') }}">
         <i class="icon fa fa-users fa-3x"></i>
        </a>
         <div class="info">
            <h4>@lang('home.users')</h4>
            <p><b>5</b></p>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon">
         <i class="icon fa fa-thumbs-o-up fa-3x"></i>
         <div class="info">
            <h4>@lang('home.likes')</h4>
            <p><b>25</b></p>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon">
        <a href="{{ route('admin.categories.index') }}">
            <i class="icon fa fa-files-o fa-3x"></i>
        </a>
         <div class="info">
            <h4>@lang('home.categories')</h4>
            <p><b>10</b></p>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon">
        <a href="{{ route('admin.films.index') }}">
            <i class="icon fa fa-star fa-3x"></i>
        </a>
         <div class="info">
            <h4>@lang('home.films')</h4>
            <p><b>500</b></p>
         </div>
      </div>
   </div>
</div>
@endsection
