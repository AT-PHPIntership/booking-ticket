@extends('admin.layout.master')
@section('title', __('user.admin.list.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">@lang('user.admin.list.title')</h3>
    <div class="table-responsive">
      @include('admin.layout.message')
      @if (count($datas))
      <table class="table">
        <thead>
          <tr>
            <th>@lang('user.admin.table.id')</th>
            <th>@lang('user.admin.table.name')</th>
            <th>@lang('user.admin.table.email')</th>
            <th>@lang('user.admin.table.phone')</th>
            <th>@lang('user.admin.table.role')</th>
            <th>@lang('user.admin.table.show')</th>
            <th>@lang('user.admin.table.delete')</th>
            <th>@lang('user.admin.table.edit')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas->all() as $key => $data)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $data->full_name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->role ? __('user.admin.table.admin') : __('user.admin.table.user') }}</td>
            <td class="center"></i> 
              <a class="btn btn-primary" href="{{ route('admin.users.show', $data->id) }}"><i class="fa fa-eye icon-size" ></i></a>
            </td>
            <td class="center">
              <form class="col-md-4" method="POST" action="{{ route('admin.users.destroy', ['id' => $data->id]) }}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('@lang('user.admin.message.del')')" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.users.edit', $data->id) }}">@lang('user.admin.table.edit')</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</div>
<div class="col-md-12"> {{ $datas->links() }}</div>
@endsection
