@extends('layouts.masterdashboard')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Category Table <span class="badge btn-info ">{{$categorys->count()}}</span></h3>
      <button type="button" class="btn btn-success" style="float: right" data-toggle="modal" data-target="#categorymodal">
        Add New
      </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>SL</th>
          <th>Category Bangla</th>
          <th>Category English</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categorys as $row )
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$row->category_bangla}} </td>
                <td>{{$row->category_english}}</td>
                <td>{{$row->created_at}}</td>
                <td>
                  <a href="{{route('category.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('category.edit',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($categorys->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
        {{-- <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot> --}}
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.modal-dialog -->
  <div class="modal fade" id="categorymodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Category Add </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('category.store')}}" role="form">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Bangla</label>
                    <input type="text" class="form-control" name="category_bangla" id="exampleInputEmail1" placeholder="Category Bangla">
                    @error('category_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category English</label>
                    <input type="text" class="form-control" name="category_english" id="exampleInputPassword1" placeholder="Category English">
                    @error('category_english')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
  </div>
@endsection
