@extends('admin.layouts.app')

@section('page_title')
<div class="row mb-0">
  <div class="col-sm-6">
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('#') }}">Home</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  @foreach ($m3u8Files as $m3u8File)
  <div class="col-md-4 mb-4">
    <!-- Player container element -->
    <div id="rmp{{ $loop->iteration }}"></div>
    <!-- Include Radiant Media Player - here we use the optimised build for hls.js -->
    <script src="https://cdn.radiantmediatechs.com/rmp/9.12.0/js/rmp-hlsjs.min.js"></script>

    <!-- Set up player configuration options -->
    <script>
      // Here we set our HLS streaming source
      const src{{ $loop->iteration }} = {
        hls: 'http://192.168.5.214:8686/hls/{{ $m3u8File->filename }}'
      };
      
      const settings{{ $loop->iteration }} = {
        licenseKey: 'ZW5ieGlkcGtna0AxNjQwODAz',
        src: src{{ $loop->iteration }},
        width: 400,
        height: 360,
        contentMetadata: {
          poster: [
            'maxresdefault.jpg'
          ]
        }
      };

      const rmp{{ $loop->iteration }} = new RadiantMP('rmp{{ $loop->iteration }}');
      rmp{{ $loop->iteration }}.init(settings{{ $loop->iteration }});
      
      // Console log the file name
      console.log('File name {{ $loop->iteration }}:', '{{ $m3u8File->filename }}');
    </script>
  </div>
  @endforeach
</div>
@endsection
