@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">LIVE TV</li>
              <li class="breadcrumb-item"><a href="#">Update</a></li>
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
        <h4 class="modal-title">LIVE TV </h4>
        @if ($livetv->status==1)
        <a href="{{route('deactive.livetv',$livetv->id)}}" style="float:right" class="btn btn-danger">Deactive</a>
        @else
        <a href="{{route('active.livetv',$livetv->id)}}" style="float:right" class="btn btn-success">Active</a>
        @endif

    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('livetv.update',$livetv->id)}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">LIVE TV</label>
                <textarea type="text" class="form-control" name="embed_code" id="exampleInputEmail1">
                    {{$livetv->embed_code}}
                </textarea>
                @if ($livetv->status==1)
                <small class="text-danger">Now live TV are Aeactive</small>
                @else
                <small class="text-danger">Now live TV are Deactive</small>
                @endif
                @error('embed_code')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Live TV Setting Update</button>
        </form>
    </div>
</div>
@endsection
