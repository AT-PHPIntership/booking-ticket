@extends('admin.layout.master')
@section('title', __('film.admin.edit.title'))
@section('content')
<div class="col-md-12">
  <div class="tile">
    <section class="invoice">
      <div class="row mb-4">
        <div class="col-6">
          <h2 class="page-header"><i class="fa fa-film"></i> {{$film->name}}</h2>
        </div>
        <div class="col-6">
          <h5 class="text-right">@lang('film.admin.add.start_date'): {{$film->start_date}}</h5>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-4 table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><strong style="font-size: 20px">@lang('category.admin.title')</strong></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categoryFilms as $categoryFilm)
              <tr>
                <td>{{$categoryFilm}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>@lang('film.admin.table.id')</th>
                <th>@lang('film.admin.table.actor')</th>
                <th>@lang('film.admin.add.producer')</th>
                <th>@lang('film.admin.add.director')</th>
                <th>@lang('film.admin.table.duration')</th>
                <th>@lang('film.admin.table.country')</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$film->id}}</td>
                <td>{{$film->actor}}</td>
                <td>{{$film->producer}}</td>
                <td>{{$film->director}}</td>
                <td>{{$film->duration}}</td>
                <td>{{$film->country}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-12">
          <p><strong style="font-size: 20px">@lang('film.admin.add.describe')</strong><br>
            {{$film->describe}}
          </p>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-6 table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><strong style="font-size: 20px">@lang('film.admin.table.image')</strong></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($film->images as $image)
              <tr>
                <td><img width="100%" src="{{ $image->path }}" alt="Film Image"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
      </div>
      
      <div class="row d-print-none mt-2">
        <div class="col-12 text-right"><a class="btn btn-secondary" href="{{ route('admin.films.index') }}">
          <i class="fa fa-fw fa-lg fa-times-circle"></i>
          @lang('film.admin.add.cancel')</a></div>
      </div>
    </section>
  </div>
</div>
@endsection
