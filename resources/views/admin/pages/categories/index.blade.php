@extends('admin.layout.master')
@section('title', __('category.admin.list.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">@lang('category.admin.list.title')</h3>
    <div class="table-responsive">
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
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td class="center">
              <form class="col-md-4" method="POST" action="#">
                  @method('DELETE')
                  {{ csrf_field() }}
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">@lang('category.admin.table.edit')</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td class="center">
              <form class="col-md-4" method="POST" action="#">
                  @method('DELETE')
                  {{ csrf_field() }}
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">@lang('category.admin.table.edit')</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
