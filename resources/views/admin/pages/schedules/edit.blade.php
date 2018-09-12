@extends('admin.layout.master')
@section('title', __('schedule.admin.add.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
    <div class="tile">
      <h3 class="tile-title">@lang('schedule.admin.edit.title')</h3>
      <div class="tile-body">
        <div class="x_content">
          <br>
          @include('admin.layout.message')
          @include('admin.layout.error')
          <form class="form-horizontal" action="{{ route('admin.schedules.update', $schedule['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('schedule.admin.add.choose_film')</label>
              <div class="col-md-8">
                <select class="form-control" id="select-film" name="film">
                  @foreach ($films as $film)
                  <option value="{{ $film->id }}" {{ $film->id == $schedule['film_id'] ? 'selected' : ''}}>{{ $film->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('schedule.admin.add.choose_room')</label>
              <div class="col-md-8">
                <select class="form-control" id="select-room" name="room">
                  @foreach ($rooms as $room)
                  <option value="{{ $room->id }}" {{ $room->id == $schedule['room_id'] ? 'selected' : ''}}>{{ $room->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label for="starttime">@lang('schedule.admin.add.start_time')</label>
                  <input class="form-control" type="text" name="starttime" value="{{ $schedule['start_time'] }}" placeholder="@lang('schedule.admin.add.placeholder_time')">
                </div>
              </div>
              <div class="col-lg-5 offset-lg-1">
                <div class="form-group">
                  <fieldset>
                    <label for="endtime">@lang('schedule.admin.add.end_time')</label>
                    <input class="form-control" type="text" name="endtime" value="{{ $schedule['end_time'] }}" placeholder="@lang('schedule.admin.add.placeholder_time')">
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <label for="type">Ticket Type:</label>
                  <input class="form-control" type="text" name="type" value="{{ $ticket['type'] ? $ticket['type'] : '' }}" placeholder="Type of ticket">
                </div>
              </div>
              <div class="col-lg-5 offset-lg-1">
                <div class="form-group">
                  <fieldset>
                    <label for="price">Price:</label>
                    <input class="form-control" type="number" min="1" name="price" value="{{ $ticket['price'] ? $ticket['price'] : '' }}" placeholder="Price of ticket">
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