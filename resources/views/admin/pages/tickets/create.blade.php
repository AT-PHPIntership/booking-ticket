@extends('admin.layout.master')
@section('title', __('ticket.admin.add.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
    <div class="tile">
      <h3 class="tile-title">@lang('ticket.admin.add.title')</h3>
      <div class="tile-body">
        <div class="x_content">
          <br>
          @include('admin.layout.message')
          @include('admin.layout.error')
          <form class="form-horizontal" action="{{ route('admin.tickets.store') }}" method="POST">
            @csrf
            <div class="form-group row">

            @if (isset($films))
            <label class="control-label col-md-3">@lang('ticket.admin.add.choose_film')</label>
            <div class="col-md-8">
              <select class="form-control" id="select-film" name="film">
                @foreach ($films as $film)
                  <option value="{{ $film->id }}">{{ $film->name }}</option>
                @endforeach
              </select>
            @endif

            @if (isset($schedules))
            <label class="control-label col-md-3">@lang('ticket.admin.add.choose_schedule')</label>
            <div class="col-md-8">
              <select class="form-control" id="select-schedule" name="schedule">
                @foreach ($schedules as $schedule)
                  <option value="{{ $schedule->id }}">{{ $schedule['room']->name . '/' . $schedule->start_time}}</option>
                @endforeach
              </select>
            @endif

          </div>
        </div>
        <div class="row" id="ticket-detail">
          <div class="col-lg-5">
            <div class="form-group">
              <label for="starttime">@lang('ticket.admin.add.type')</label>
              <input class="form-control" type="text" name="type" value="{{ old('type') }}" placeholder="@lang('ticket.admin.add.placeholder_type')">
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="form-group">
              <fieldset>
                <label for="endtime">@lang('ticket.admin.add.price')</label>
                <input class="form-control" type="text" name="price" value="{{ old('price') }}" placeholder="@lang('ticket.admin.add.placeholder_price')">
              </fieldset>
            </div>
          </div>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>@lang('schedule.admin.add.submit')</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script src="js/admin/create_ticket.js"></script>
@endsection
