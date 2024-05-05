@extends('admin.layouts.app')

@section('page_title')
<div class="row mb-0">
  <div class="col-sm-6">
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
        <h3 class="card-title">Video Transcoding List</h3>
    </div>
    <div class="card-body">
        @if (count($videoParameters) > 0)
           <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Audio Bitrate</th>
                    <th>Video Bitrate</th>
                    <th>Action</th>
                    <!-- Add more table headers if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($videoParameters as $parameter)
                    <tr>
                        <td>{{ $parameter->audio_bitrate }}</td>
                        <td>{{ $parameter->video_bitrate }}</td>
                        <td class="d-flex justify-content-center">
                          <div class="btn-group" role="group">
                              <a href="{{ url("/titan/$parameter->id/edit") }}" class="btn btn-primary btn-sm">Update</a>
                              <form action="{{ url("/titan/$parameter->id") }}" method="POST" onsubmit="return confirm('Do you really want to delete this category?');">
                                  @csrf
                                  @method('delete')
                                  <input type="submit" value="Delete" class="btn btn-danger btn-sm ml-1">
                              </form>
                          </div>
                      </td>
                        <!-- Add more table cells if needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>


        @else
            <p>No video parameters found.</p>
        @endif
    </div>
</div>
@endsection
