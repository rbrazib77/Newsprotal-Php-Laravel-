@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Notice</li>
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
        <h4 class="modal-title">Notice </h4>
        @if ($notice->status==1)
        <a href="{{route('deactive.notice',$notice->id)}}" style="float:right" class="btn btn-danger">Deactive</a>
        @else
        <a href="{{route('active.notice',$notice->id)}}" style="float:right" class="btn btn-success">Active</a>
        @endif

    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('notice.update',$notice->id)}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Notice Bangla</label>
                <textarea type="text" class="form-control" name="notice_bangla" id="exampleInputEmail1">
                    {{$notice->notice_bangla }}
                </textarea>
                @error('notice_bangla')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Notice English</label>
                <textarea type="text" class="form-control" name="notice_english" id="exampleInputEmail1">
                    {{$notice->notice_english }}
                </textarea>
                @error('embed_code')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
                @if ($notice->status==1)
                <small class="text-danger">Now Notice are Aeactive</small>
                @else
                <small class="text-danger">Now Notice are Deactive</small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Notice Setting Update</button>
        </form>
    </div>
</div>
@endsection

