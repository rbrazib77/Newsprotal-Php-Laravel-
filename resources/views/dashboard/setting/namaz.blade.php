@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Namaz Time</li>
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
        <h4 class="modal-title">Namaz Time </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('namaz.update',$namazs->id)}}" role="form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fajr Bangla</label>
                        <input type="text" class="form-control" name="fajr_bangla" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->fajr_bangla}}">
                        @error('fajr_bangla')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fajr English</label>
                        <input type="text" class="form-control" name="fajr_english" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->fajr_english}}">
                        @error('fajr_english')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">johr Bangla</label>
                        <input type="text" class="form-control" name="johr_bangla" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->johr_bangla}}">
                        @error('johr_bangla')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">johr English</label>
                        <input type="text" class="form-control" name="johr_english" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->johr_english}}">
                        @error('johr_english')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Asor Bangla</label>
                        <input type="text" class="form-control" name="asor_bangla" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->asor_bangla}}">
                        @error('asor_bangla')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Asor English</label>
                        <input type="text" class="form-control" name="asor_english" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->asor_english}}">
                        @error('asor_english')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Magrib Bangla</label>
                        <input type="text" class="form-control" name="magrib_bangla" id="exampleInputEmail1" placeholder="Magrib Bangla" value="{{$namazs->magrib_bangla}}">
                        @error('magrib_bangla')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Magrib English</label>
                        <input type="text" class="form-control" name="magrib_english" id="exampleInputEmail1" placeholder="Magrib Bangla" value="{{$namazs->magrib_english}}">
                        @error('magrib_english')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Asha Bangla</label>
                        <input type="text" class="form-control" name="asha_bangla" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->asha_bangla}}">
                        @error('asha_bangla')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Asha English</label>
                        <input type="text" class="form-control" name="asha_english" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->asha_english}}">
                        @error('asha_english')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">jummah Bangla</label>
                        <input type="text" class="form-control" name="jummah_bangla" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->jummah_bangla}}">
                        @error('jummah_bangla')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">jummahEnglish</label>
                        <input type="text" class="form-control" name="jummah_english" id="exampleInputEmail1" placeholder="Fajr" value="{{$namazs->jummah_english}}">
                        @error('jummah_english')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Namaz Setting Update</button>
        </form>
    </div>
</div>
@endsection
