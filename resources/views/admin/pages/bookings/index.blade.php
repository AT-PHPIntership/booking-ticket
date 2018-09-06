@extends('admin.layout.master')
@section('title', __('booking.admin.list.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">@lang('booking.admin.list.title')</h3>
    <div class="table-responsive">
      @include('admin.layout.message')
      <table class="table">
        <thead>
          <tr>
            <th>@lang('booking.admin.table.id')</th>
            <th>@lang('booking.admin.table.name')</th>
            <th>@lang('booking.admin.table.email')</th>
            <th>@lang('booking.admin.table.quantity')</th>
            <th>@lang('booking.admin.table.price')</th>
            <th>@lang('booking.admin.table.delete')</th>
            <th>@lang('booking.admin.table.show')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bookings as $key => $booking)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $booking->name }}</td>
              <td>{{ $booking->email }}</td>
              <td>{{ $booking->quantity }}</td>
              <td>{{ number_format($booking->price) }}</td>
              <td class="center">
                <form class="col-md-4" method="POST"
                  action="{{ route('admin.bookings.destroy', $booking->id) }}">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit" data-confirm="{{ trans('booking.admin.message.msg_del') }}">
                      <i class="fa fa-trash-o  fa-fw" ></i>
                    </button>
                </form>
              </td>
              <td class="center"></i> 
                <a class="btn btn-primary" href="{{ route('admin.bookings.show', $booking->id) }}"><i class="fa fa-eye icon-size" ></i></a>
              </td>
            </tr>
          @endforeach
          @if (!$bookings)
            <tr>
              <td colspan="7">@lang('booking.admin.message.empty_data')</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-md-12">{{ $bookings->links()}}</div>
@endsection
@section('script')
  <script src="js/admin/list_film.js"></script>
@endsection
