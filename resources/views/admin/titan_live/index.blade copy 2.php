<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;

    }
    .text-danger-glow {
    color: #ff4141;
     text-shadow: 0 0 20px #f00, 0 0 30px #f00, 0 0 40px #f00, 0 0 50px #f00, 0 0 60px #f00, 0 0 70px #f00, 0 0 80px #f00;
   }

    .blink {
      animation: blinker 1s cubic-bezier(.5, 0, 1, 1) infinite alternate;
    }
    @keyframes blinker {
    from { opacity: 1; }
    to { opacity: 0; }
    }

    header {
      background-color: #343a40;
      color: #fff;
      padding: 0px;
      text-align: center;
    }

    .mosaic-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding: 20px;
      background: url('dotted-pattern.png'); /* Replace 'dotted-pattern.png' with the path to your image */
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .channel-item {
      position: relative;
      background-color: #fff;
      padding: 15px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .channel-item:hover {
      transform: scale(1.05);
    }

    .channel-logo {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 10px;
      object-fit: cover;
    }

    .channel-name {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .channel-options {
      font-size: 14px;
      color: #495057;
    }

    .channel-status {
      margin-top: 10px;
      font-weight: bold;
      color: #6c757d;
    }

    .channel-light {
      height: 20px;
      width: 20px;
      display: inline-block;
      margin-right: 5px;
      animation: blink 1s infinite alternate; /* Blinking animation */
      border-radius: 50%; /* Make the light circular */
    }

    .light-green {
      background-color: #28a745; /* Green color */
    }

    .light-red {
      background-color: #dc3545; /* Red color */
    }

    .channel-button {
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .channel-button:hover {
      background-color: #0056b3;
    }
    /* Rounded modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 10%;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      border-radius: 25px; /* Adjust the border-radius to create rounded corners */
      padding: 20px;
      border: 1px solid #e6337a;
      width: 80%;
      max-width: 600px;
      margin: 15% auto;
    }

    .close {
      color: red; /* Change the color to red */
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: darkred; /* Change hover/focus color */
      text-decoration: none;
      cursor: pointer;
    }
    @keyframes blink {
      from {
        opacity: 1;
      }
      to {
        opacity: 0.2;
      }
    }
    /* CSS modifications for channel-item checking state and loading spinner */
    .channel-item.checking {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add a shadow effect */
      border: 2px solid #3498db; /* Change border color as desired */
      transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out; /* Add transition effect */
    }
     /* CSS modifications for channel-item checking state and loading spinner */
    .channel-item.checking {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add a shadow effect */
      border: 2px solid #3498db; /* Change border color as desired */
      transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out; /* Add transition effect */
    }

      .loading-spinner {
      width: 80px;
      height: 80px;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      display: none; /* Initially hide the spinner */
    }

    .loading-spinner .bar {
      width: 10px;
      height: 30px;
      background-color: #3498db; /* Change the color as desired */
      position: absolute;
      top: 25px;
      animation: barSpin 1.2s linear infinite;
    }

    .loading-spinner .bar:nth-child(2) {
      transform: rotate(120deg);
      animation-delay: -0.4s;
    }

    .loading-spinner .bar:nth-child(3) {
      transform: rotate(240deg);
      animation-delay: -0.8s;
    }

    @keyframes barSpin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .channel-item.checking .loading-spinner {
      display: block;
  }
  </style>
  <title>Toffee Channel Monitoring</title>
</head>
<body>
  <header style="display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center;">
        <a href="#">
          <img src="{{ asset('/admin/dist/img/toffee-icon.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8; border-left-style: solid; margin-left: 20px; border-left-width: 0px; height: 30px; width: 115px;margin-top: 10px;">
        </a>
        <h1 style="text-align: center; margin-left: 350px;">Toffee Channel Check</h1>
    </div>
    <!-- <a href="{{ url('/dashboard') }}" class="nav-link" style="display: inline-block; padding: 8px 16px; background-color: #e6337a; color: white; text-decoration: none; border-radius: 4px;">
        Dashboard
    </a>
    <a href="{{ url('/dashboard') }}" class="nav-link" style="display: inline-block; padding: 8px 16px; background-color: #e6337a; color: white; text-decoration: none; border-radius: 4px;">
        Logout
    </a> -->

    <div style="display: flex; gap: 10px;">
    <a href="{{ url('/dashboard') }}" class="nav-link" style="flex: 1; padding: 8px 16px; background-color: #e6337a; color: white; text-decoration: none; border-radius: 4px; text-align: center;">
        Dashboard
    </a>

    <form method="POST" action="#" style="flex: 1; margin: 0; display: flex;">
        @csrf
        <button type="submit" class="nav-link" style="flex: 1; padding: 8px 16px; background-color: #e6337a; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; margin-right: 10px;">
            Logout
        </button>
    </form>
</div>


</header>

<div class="mosaic-container">

</div>

</body>
</html>
