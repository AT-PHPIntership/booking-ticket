@extends('admin.layout.master')
@section('title', __('user.admin.edit.title'))
@section('content')
<div class="row user">
  <div class="col-md-12">
    <div class="profile">
      <div class="info">
        <img class="user-img" src="images/admin/avatar/admin.png">
        <h4>{{$user->full_name}}</h4>
      </div>
      <div class="cover-image"></div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="tile p-0">
      <ul class="nav flex-column nav-tabs user-tabs">
        <li class="nav-item"><a class="nav-link active show" href="#user-timeline" data-toggle="tab">@lang('user.admin.table.time_line')</a></li>
        <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">@lang('master.setting')</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-9">
    <div class="tab-content">
      <div class="tab-pane active show" id="user-timeline">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"></i> {{$user->full_name}}</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">@lang('user.admin.table.created_at'): {{$user->created_at}}</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <address><br><strong>@lang('user.admin.table.address')</strong>: {{$user->address}}<br><strong>
                    @lang('user.admin.table.phone')</strong>: {{$user->phone}}<br><strong>@lang('user.admin.table.email')</strong>: {{$user->email}}
                  </address>
                </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th>@lang('user.admin.table.created_at')</th>
                        <th>@lang('user.admin.table.updated_at')</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          @if ($user->role)
                          <strong>@lang('user.admin.table.admin')</strong>
                          @else
                          <strong>@lang('user.admin.table.user')</strong>
                          @endif
                        </td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-secondary" href="{{ route('admin.users.index') }}">
                  <i class="fa fa-fw fa-lg fa-times-circle"></i>
                  @lang('user.admin.add.cancel')</a>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="user-settings">
        @include('admin.layout.error')
        <div class="tile user-settings">
          <h4 class="line-head">@lang('master.setting')</h4>
          <form class="form-horizontal" action="{{ route('admin.users.update', $user->id) }}"  method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.name')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="full_name" type="text" value="{{ old('full_name', $user->full_name) }}" placeholder="@lang('user.admin.add.placeholder_name')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.email')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="email" type="email" value="{{ old('email', $user->email) }}" placeholder="@lang('user.admin.add.placeholder_email')">
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
                <input class="form-control col-md-8" name="phone" type="text" value="{{ old('phone', $user->phone) }}" placeholder="@lang('user.admin.add.placeholder_phone')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('user.admin.add.address')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="address" type="text" value="{{ old('address', $user->address) }}" placeholder="@lang('user.admin.add.placeholder_address')">
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
