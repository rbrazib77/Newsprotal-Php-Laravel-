@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Category</li>
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6 text-right">
            {{-- <button class="btn btn-success" style="float: right">Add</button> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Sub-category Update </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('subcategory.update',$subcategorys->id)}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Sub-category Bangla</label>
                <input type="text" class="form-control" name="subcategory_bangla" id="exampleInputEmail1" placeholder="Category Bangla" value="{{$subcategorys->subcategory_bangla}}">
                @error('subcategory_bangla')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Sub-category English</label>
                <input type="text" class="form-control" name="subcategory_english" id="exampleInputPassword1" placeholder="Category English" value="{{$subcategorys->subcategory_english}}">
                @error('subcategory_english')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Choose Category</label>
                <select class="form-control" name="category_id">
                    <option disabled="" selected="">==Choose Category==</option>
                    @foreach ($category as $row)
                    <option  value="{{$row->id}}" <?php if($row->id==$subcategorys->category_id)echo"selected" ?> >{{$row->category_bangla}} | {{$row->category_english}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sub-category Update</button>
        </form>
    </div>
</div>
@endsection

