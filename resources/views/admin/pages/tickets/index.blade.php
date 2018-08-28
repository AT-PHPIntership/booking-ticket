@extends('admin.layout.master')
@section('title', __('ticket.admin.list.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">@lang('ticket.admin.list.title')</h3>
    <div class="table-responsive">
      @include('admin.layout.message')
      @if (session('err'))
        <div class="alert alert-danger">
          {{ session('err') }}
        </div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th>@lang('ticket.admin.table.id')</th>
            <th>@lang('ticket.admin.table.type')</th>
            <th>@lang('ticket.admin.table.price')</th>
            <th>@lang('ticket.admin.table.name_film')</th>
            <th>@lang('ticket.admin.table.time')</th>
            <th>@lang('category.admin.table.delete')</th>
            <th>@lang('category.admin.table.edit')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $ticket)
            <tr>
              <td>{{ $ticket->id }}</td>
              <td>{{ $ticket->type }}</td>
              <td>{{ $ticket->price }}</td>
              <td>{{ $ticket->film_name }}</td>
              <td>{{ $ticket->time }}</td>
              <td class="center">
                <form class="col-md-4" method="POST"
                  action="{{ route('admin.tickets.destroy', $ticket->id) }}">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit" data-confirm="{{ trans('ticket.admin.message.msg_del') }}">
                      <i class="fa fa-trash-o  fa-fw" ></i>
                    </button>
                </form>
              </td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                <a href="{{ route('admin.tickets.edit', $ticket->id) }}">@lang('ticket.admin.table.edit')</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-md-12">{{ $tickets->links()}}</div>
@endsection
@section('script')
  <script src="js/admin/list_film.js"></script>
@endsection
