@extends('admin.layout.master')
@section('title', __('booking.admin.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
    <div class="tile">
      <h3 class="tile-title">@lang('booking.admin.show.title')</h3>
      @include('admin.layout.message')
      <div class="tile-body">
        <form class="form-horizontal" action="" method="post">
          @csrf
          <div class="form-group row">
            <label class="control-label col-md-3">@lang('booking.admin.table.name')</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" value="{{$booking->user->full_name}}" disabled type="text" >
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">@lang('booking.admin.table.email')</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" type="text" value="{{$booking->user->email}}" disabled>
            </div>
          </div>
          <div class="container">          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>@lang('booking.admin.table.film')</th>
                  <th>@lang('booking.admin.table.room')</th>
                  <th>@lang('booking.admin.table.seat')</th>
                  <th>@lang('booking.admin.table.price')</th>
                  <th>@lang('booking.admin.table.start_time')</th>
                  <th>@lang('booking.admin.table.end_time')</th>
                </tr>
              </thead>
              <tbody>
          @foreach ($bookings as $key => $booking)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{$booking->film}}</td>
              <td>{{$booking->room}}</td>
              <td>{{$booking->seat}}</td>
              <td>{{$booking->price}}</td>
              <td>{{$booking->start}}</td>
              <td>{{$booking->end}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
          <div class="tile-footer">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <form class="col-md-4" method="POST"
                  action="{{ route('admin.bookings.destroy', $booking->id) }}">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit" data-confirm="{{ trans('booking.admin.message.msg_del') }}">
                      <i class="fa fa-trash-o  fa-fw" ></i>
                    </button>
                </form>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" href="{{ route('admin.bookings.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
                  @lang('category.admin.add.cancel')
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script src="js/admin/list_film.js"></script>
@endsection
