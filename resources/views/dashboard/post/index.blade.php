@extends('layouts.masterdashboard')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Post Table Post <span class="badge btn-info ">{{$posts->count()}}</span></h3>
      <a href="{{route('insert.post')}}">
        <button type="button" class="btn btn-success" style="float: right">Add New</button>
        </a>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>SL</th>
          <th>Category</th>
          <th>Sub Category</th>
          <th>Title</th>
          <th>Thumbnail</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $row )
            <tr>
                <td>{{$posts->firstitem()+ $loop->index}}</td>
                <td>{{$row->category_bangla}} </td>
                <td>{{$row->subcategory_bangla}}</td>
                <td>{{$row->title_bangla}}</td>
                <td>
                    <img src="{{asset('postimages/')}}/{{$row->image}}" style="height: 80px; width:80px">
                </td>
                <td>{{$row->post_date}}</td>
                <td>
                  <a href="{{route('post.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('post.edit',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($posts->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
      </table>
      {{$posts->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.modal-dialog -->

@endsection
