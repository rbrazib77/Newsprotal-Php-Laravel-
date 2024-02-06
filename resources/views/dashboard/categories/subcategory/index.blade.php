@extends('layouts.masterdashboard')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Sub-category Table <span class="badge btn-info ">{{$subcategory->count()}}</span></h3>
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
          <th>Sub-category Bangla</th>
          <th>Sub-category English</th>
          <th>Category ID</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($subcategory as $row )
            <tr>
                <td>{{$subcategory->firstitem()+ $loop->index}}</td>
                <td>{{$row->subcategory_bangla}} </td>
                <td>{{Str::title($row->subcategory_english)}}</td>
                <td>{{$row->category_bangla}}</td>
                <td>{{$row->created_at}}</td>
                <td>
                  <a href="{{route('subcategory.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('subcategory.edit',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($subcategory->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
      </table>
   {{$subcategory->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.modal-dialog -->
  <div class="modal fade" id="categorymodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Sub-category Add</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('subcategory.store')}}" role="form">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub-category Bangla</label>
                    <input type="text" class="form-control" name="subcategory_bangla" id="exampleInputEmail1" placeholder="Category Bangla">
                    @error('category_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sub-category English</label>
                    <input type="text" class="form-control" name="subcategory_english" id="exampleInputPassword1" placeholder="Category English">
                    @error('category_english')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Choose Category</label>
                    <select class="form-control" name="category_id">
                        <option disabled="" selected="">==Choose Category==</option>
                        @foreach ($category as $row)
                        <option  value="{{$row->id}}">{{$row->category_bangla}} | {{$row->category_english}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Sub-category</button>
            </form>
        </div>
    </div>
  </div>
@endsection

