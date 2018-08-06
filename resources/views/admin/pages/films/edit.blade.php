@extends('admin.layout.master')
@section('title', __('film.admin.edit.title'))
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
      <div class="tile">
        <h3 class="tile-title">@lang('film.admin.edit.title')</h3>
        @include('admin.layout.error')
        <div class="tile-body">
          <form class="form-horizontal" action="{{ route('admin.films.update', $film->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('category.admin.title')</label>
              <div class="col-md-8" >
                <select name="categories[]" id="multiple_dropdown_select" class="form-control col-md-8" multiple>
                  @foreach ( $categories as $category )
                    <option value="{{ $category->id }}"
                      @foreach ($film->cateroryFilms as $cateroryFilm)
                        @if ($cateroryFilm->category_id == $category->id)
                          {{ "selected" }}
                        @endif
                      @endforeach
                    >{{ $category->name }}</option>   
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3"></label>
              <div class="col-md-8">
                <input class="form-control col-md-8" type="text" id="selected_values" name="multiple_selected_values" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('film.admin.table.name')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="name" value="{{ $film->name }}" type="text" value="{{ old('name') }}" placeholder="@lang('film.admin.add.placeholder_name')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('film.admin.table.actor')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="actor" value="{{ $film->actor }}" type="text" value="{{ old('actor') }}" placeholder="@lang('film.admin.add.placeholder_actor')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('film.admin.add.producer')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="producer" value="{{ $film->producer }}" type="text" value="{{ old('producer') }}" placeholder="@lang('film.admin.add.placeholder_producer')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('film.admin.add.director')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="director" value="{{ $film->director }}"
                 type="text" value="{{ old('director') }}" placeholder="@lang('film.admin.add.placeholder_director')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('film.admin.table.duration')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="duration" value="{{ $film->duration }}" 
                type="text" value="{{ old('duration') }}" placeholder="@lang('film.admin.add.placeholder_duration')">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('film.admin.add.describe')</label>
              <div class="col-md-8">
                <textarea class="form-control col-md-8" name="describe" type="text" id="describe" 
                value="{{ old('describe') }}" placeholder="@lang('film.admin.add.placeholder_describe')">
                  {{ old('describe') }}
                  {{ $film->describe }}
                </textarea>
              </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.image')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="photos[]" type="file" 
                  placeholder="@lang('film.admin.add.placeholder_image')" multiple>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="del_image" hidden type="text" id="del_image">
                </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3"></label>
              <div class="col-md-8">
                <table >
                    <tbody>
                      @foreach ($film->images as $image)
                      <tr id="tr-{{$image->id}}">
                        <td style="width: 50%;"><img width="100px" height="75px" src="{{ $image->path }}" alt="Film Image" class="rounded"></td>
                        <td style="width: 25%;"><a style="font-size:24px" class="remove" id="remove-{{$image->id}}" >
                          <i class="fa fa-remove" style="font-size:25px;color:red" onclick="return delImage('{{$image->id}}', '{{$image->id}}')"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">@lang('film.admin.table.country')</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" name="country" value="{{ $film->country }}"
                 type="text" value="{{ old('country') }}" placeholder="@lang('film.admin.add.placeholder_country')">
              </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" id="button" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                    @lang('film.admin.add.edit')
                  </button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="{{ route('admin.films.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
                    @lang('film.admin.add.cancel')
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
  <script src="js/admin/edit_film.js"></script>
@endsection