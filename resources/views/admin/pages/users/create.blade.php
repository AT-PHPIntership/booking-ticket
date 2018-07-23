@extends('admin.layout.master')
@section('title', __('user.admin.add.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
      <div class="tile">
        <h3 class="tile-title">@lang('user.admin.add.title')</h3>
        <div class="tile-body">
          <form class="form-horizontal" action="" method="POST">
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.name')</label>
              <div class="col-md-8">
                <input class="form-control" type="text" placeholder="@lang('user.admin.add.placeholder_name')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.email')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" type="email" placeholder="@lang('user.admin.add.placeholder_email')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.address')</label>
              <div class="col-md-8">
                <textarea class="form-control" rows="4" placeholder="@lang('user.admin.add.placeholder_address')"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.gender')</label>
              <div class="col-md-9">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender">@lang('user.admin.add.male')
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender">@lang('user.admin.add.female')
                  </label>
                </div>
              </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>@lang('user.admin.add.submit')</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
@endsection
