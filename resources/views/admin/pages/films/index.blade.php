@extends('admin.layout.master')
@section('title', __('film.admin.list.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">@lang('film.admin.list.title')</h3>
    <div class="table-responsive">
      @include('admin.layout.message')
      <table class="table">
        <thead>
          <tr>
            <th>@lang('film.admin.table.id')</th>
            <th>@lang('film.admin.table.name')</th>
            <th>@lang('film.admin.table.actor')</th>
            <th>@lang('film.admin.table.duration')</th>
            <th>@lang('film.admin.table.image')</th>
            <th>@lang('film.admin.table.country')</th>
            <th>@lang('film.admin.table.delete')</th>
            <th>@lang('film.admin.table.edit')</th>
          </tr>
        </thead>
        <tbody>
          @if ($films)
            @foreach ($films as $film)
              <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->name }}</td>
                <td>{{ $film->actor }}</td>
                <td>{{ $film->duration }}</td>
                <td>
                  @if ($film->images->count() > 0)
                    @foreach ($film->images as $image)
                      <img width="100px" src="{{ $image->path }}" alt="Film Image"><br>
                      <br>
                    @endforeach
                  @else
                    <strong>No picture</strong>
                  @endif
                </td>
                <td>{{ $film->country }}</td>
                <td class="center">
                  <form class="col-md-4" method="POST" onclick="return confirm('@lang('film.admin.message.msg_del')')"
                   action="{{ route('admin.films.destroy', $film->id) }}">
                      @method('DELETE')
                      {{ csrf_field() }}
                      <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
                  </form>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> 
                  <a href="{{ route('admin.films.edit', $film->id) }}">@lang('film.admin.table.edit')</a>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-md-12">{{ $films->links()}}</div>
@endsection
