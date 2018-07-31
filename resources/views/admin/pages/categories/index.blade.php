@extends('admin.layout.master')
@section('title', __('category.admin.list.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">@lang('category.admin.list.title')</h3>
    <div class="table-responsive">
      @include('admin.layout.message')
      <table class="table">
        <thead>
          <tr>
            <th>@lang('category.admin.table.id')</th>
            <th>@lang('category.admin.table.name')</th>
            <th>@lang('category.admin.table.created_at')</th>
            <th>@lang('category.admin.table.updated_at')</th>
            <th>@lang('category.admin.table.delete')</th>
            <th>@lang('category.admin.table.edit')</th>
          </tr>
        </thead>
        <tbody>
          @if ($categories)
            @foreach ($categories as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td class="center">
                  <form class="col-md-4" method="POST" onclick="return confirm('@lang('category.admin.message.msg_del')')"
                   action="{{ route('admin.categories.destroy', $item->id) }}">
                      @method('DELETE')
                      {{ csrf_field() }}
                      <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
                  </form>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                  <a href="{{ route('admin.categories.edit', $item->id) }}">@lang('category.admin.table.edit')</a>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-md-12">{{ $categories->links()}}</div>
@endsection
