@extends('admin.layout.master')
@section('title', __('schedule.admin.list.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">@lang('schedule.admin.list.title')</h3>
    <div class="table-responsive">
      @include('admin.layout.message')
      @if (count($schedules))
      <table class="table">
        <thead>
          <tr>
            <th>@lang('schedule.admin.table.id')</th>
            <th>@lang('schedule.admin.table.name')</th>
            <th>@lang('schedule.admin.table.room')</th>
            <th>@lang('schedule.admin.table.start_time')</th>
            <th>@lang('schedule.admin.table.end_time')</th>
            <th>@lang('schedule.admin.table.delete')</th>
            <th>@lang('schedule.admin.table.edit')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($schedules as $index=>$schedule)
          <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $schedule->film_name }}</td>
            <td>{{ $schedule->name }}</td>
            <td>{{ $schedule->start_time }}</td>
            <td>{{ $schedule->end_time}}</td>
            <td class="center">
              <form class="col-md-4" method="POST" action="{{ route('admin.schedules.destroy', ['id' => $schedule->id]) }}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" type="submit" data-confirm="{{ trans('schedule.admin.message.msg_del') }}"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.schedules.edit', $schedule->id) }}">@lang('user.admin.table.edit')</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</div>
<div class="col-md-12">{{ $schedules->links()}}</div>
@endsection
@section('script')
  <script src="js/admin/list_film.js"></script>
@endsection
