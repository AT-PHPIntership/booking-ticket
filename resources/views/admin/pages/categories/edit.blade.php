@extends('admin.layout.master')
@section('title')
    Edit category
@endsection
@section('content')
<div class="col-md-12">
  <div class="col-md-10">
      <div class="tile">
        <h3 class="tile-title">Edit</h3>
        <div class="tile-body">
          <form class="form-horizontal">
            <div class="form-group row">
              <label class="control-label col-md-3">Name</label>
              <div class="col-md-8">
                <input class="form-control" type="text" placeholder="Enter full name">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Description</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" type="email" placeholder="Enter description">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Content</label>
              <div class="col-md-8">
                <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-8 col-md-offset-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">I accept the terms and conditions
                  </label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection