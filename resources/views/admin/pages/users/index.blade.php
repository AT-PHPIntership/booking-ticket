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
            <th>@lang('user.admin.table.address')</th>
            <th>@lang('user.admin.table.is_active')</th>
            <th>@lang('user.admin.table.last_login')</th>
            <th>@lang('user.admin.table.role')</th>
            <th>@lang('user.admin.table.delete')</th>
            <th>@lang('user.admin.table.edit')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas->all() as $data)
          <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->full_name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->address }}</td>
            <td>{{ $data->is_active ? __('user.admin.table.active') : __('user.admin.table.inactive') }}</td>
            <td>{{ $data->last_login_at }}</td>
            <td>{{ $data->role ? __('user.admin.table.admin') : __('user.admin.table.user') }}</td>
            <td class="center">
              <form class="col-md-4" method="POST" action="#">
                  @method('DELETE')
                  {{ csrf_field() }}
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::to('admin/users/'.$data->id.'/edit') }}">@lang('user.admin.table.edit')</a></td>
          </tr>
          @endforeach
        </tbody>
      {{ $datas->links() }}
      </table>
      @endif
    </div>
  </div>
</div>
@endsection
