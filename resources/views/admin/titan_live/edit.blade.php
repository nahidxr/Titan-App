@extends('admin.layouts.app')

@section('page_title')
<div class="row mb-0">
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('#') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Parameter</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card card-primary" >
    <div class="card-header">
        <h3 class="card-title">Edit Parameter</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('video-parameters.update', $videoParameter->id) }}" method="POST">
            @csrf
            @method('PUT')

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

            <div class="form-group row">
                <label for="regulation_name" class="col-sm-2 col-form-label">Regulation Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="regulation_name" id="regulation_name" value="{{ $videoParameter->regulation_name }}" placeholder="Enter Audio Rate" style="width: 400px;" required autofocus autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="audio_bitrate" class="col-sm-2 col-form-label">Audio Bitrate</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="audio_bitrate" id="audio_bitrate"
                        value="{{ $videoParameter->audio_bitrate }}" style="width: 400px;" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="video_bitrate" class="col-sm-2 col-form-label">Video Bitrate</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="video_bitrate" id="video_bitrate"
                        value="{{ $videoParameter->video_bitrate }}" style="width: 400px;" required>
                </div>
            </div>
            <div class="form-group row">
                    <label  for="user" class="col-sm-2 col-form-label"> Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control" style="width: 400px;">
                            <option value="">Select Status</option>
                            @foreach ($status as $x=>$status)
                            <option value="{{ $x }}" {{ $videoParameter->status==$x ? 'selected' : ''}}>{{ $status }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                {{-- <a href="{{ route('video-parameters.index') }}" class="btn btn-secondary">Cancel</a> --}}
            </div>
        </form>
    </div>
</div>
@endsection
