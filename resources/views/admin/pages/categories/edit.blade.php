@extends('admin.layout.master')
@section('title', __('category.admin.edit.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
      <div class="tile">
        <h3 class="tile-title">@lang('category.admin.edit.title')</h3>
        @include('admin.layout.error')
        <div class="tile-body">
          <form class="form-horizontal" action="{{ route('admin.categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('category.admin.table.name')</label>
              <div class="col-md-8">
                <input class="form-control" value="{{ $category->name }}" type="text" name="name" placeholder="{{__('category.admin.add.placeholder_name')}}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                  @lang('category.admin.add.edit')
                </button>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
                  @lang('category.admin.add.cancel')
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
