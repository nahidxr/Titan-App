
@extends('admin.layouts.app')

@section('page_title')

<div class="row mb-0">
  <div class="col-sm-6">
    {{-- <h1>Video Transcoding  Perameter</h1> --}}
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('#') }}">Home</a></li>
      <li class="breadcrumb-item active"> Profile</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Video Transcoding Parameter</h3>
    </div>
    <div class="card-body">
        <form action="{{ url("/titan") }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-body">

                <div class="form-group row">
                    <label for="audio_rate" class="col-sm-2 col-form-label">Audio Rate</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="audio_rate" id="audio_rate" value="" placeholder="Enter Audio Rate" style="width: 400px;" required autofocus autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="video_rate" class="col-sm-2 col-form-label">Video Rate</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="video_rate" id="video_rate" value="" placeholder="Enter Video Rate" style="width: 400px;" required autocomplete="off">
                    </div>
                </div>
                 <div class="form-group row">
                    <label  for="user" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control" style="width: 400px;">
                            <option value="">Select Status</option>
                            @foreach ($status as $x=>$status)
                            <option value="{{ $x }}" {{ old('status')==$x ? 'selected' : ''}}>{{ $status }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection
