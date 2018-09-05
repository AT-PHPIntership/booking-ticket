@extends('admin.layout.master')
@section('title', __('ticket.admin.add.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
      <div class="tile">
        <h3 class="tile-title">@lang('ticket.admin.add.title')</h3>
        @include('admin.layout.error')
        @if (session('message'))
          <div class="alert alert-danger">
            {{ session('message') }}
          </div>
        @endif
        <div class="tile-body">
          <form class="form-horizontal" action="{{ route('admin.tickets.store') }}" method="post">
            @csrf
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('ticket.admin.table.schedule_id')</label>
              <div class="col-md-8" >
                <select name="schedule_id" id="schedule_id" class="form-control col-md-12">
                  @foreach ( $schedules as $schedule )
                    <option value="{{ $schedule->id }}" >{{ $schedule->id }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('ticket.admin.table.name_film')</label>
              <div class="col-md-8" id="film_schedule">
                <input class="form-control" type="text" value="" disabled >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('ticket.admin.table.type')</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="type" value="{{ old('type') }}" placeholder="{{__('ticket.admin.add.placeholder_type')}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('ticket.admin.table.price')</label>
              <div class="col-md-8">
                <input class="form-control" type="number" name="price" value="{{ old('price') }}" placeholder="{{__('ticket.admin.add.placeholder_price')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                  @lang('ticket.admin.add.submit')
                </button>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" href="{{ route('admin.tickets.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
                  @lang('ticket.admin.add.cancel')
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
@section('script')
  <script src="js/admin/add_ticket.js"></script>
@endsection