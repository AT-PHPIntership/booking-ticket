@extends('admin.layout.master')
@section('title')
    List user
@endsection
@section('content')
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">User</h3>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Delete</th>
            <th>Edit</th>
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
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Edit</a></td>
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
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Edit</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
