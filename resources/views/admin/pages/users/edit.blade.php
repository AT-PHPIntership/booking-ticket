@extends('admin.layout.master')
@section('title', __('user.admin.edit.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
      <div class="tile">
        <h3 class="tile-title">@lang('user.admin.edit.title')</h3>
        <div class="tile-body">
          @include('admin.layout.message')
          @include('admin.layout.error')
          @if (isset($datas))
          <form class="form-horizontal" action="{{ route('admin.users.update', $datas->id) }}"  method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.name')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="full_name" type="text" value="{{ $datas->full_name }}" placeholder="@lang('user.admin.add.placeholder_name')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.email')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="email" type="email" value="{{ $datas->email }}" placeholder="@lang('user.admin.add.placeholder_email')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.password')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="password" type="password" placeholder="@lang('user.admin.add.placeholder_password')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.phone')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="phone" type="text" value="{{ $datas->phone }}" placeholder="@lang('user.admin.add.placeholder_phone')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.address')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="address" type="text" value="{{ $datas->address }}" placeholder="@lang('user.admin.add.placeholder_address')">
              </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>@lang('user.admin.add.submit')</button>
                </div>
              </div>
            </div>
          </form>
          @endif
        </div>
      </div>
  </div>
@endsection
