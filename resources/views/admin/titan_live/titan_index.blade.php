<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Template</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- For icons -->
  <style>
    /* Custom CSS */
    .navbar {
      background-color: #000;
    }
    .navbar-brand {
      color: #fff;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }
    .navbar-brand img {
      height: 40px;
      width: auto; /* To maintain aspect ratio */
    }
    .navbar-nav .nav-link {
      color: #fff;
    }
    .navbar-nav .nav-link:hover {
      color: #ccc; /* Change hover color if needed */
    }
    .main-nav {
      background-color: #333;
      text-align: center;
      padding: 10px 0;
      height: 60px; /* Increase height */
    }
    .main-nav a {
      color: #fff;
      margin: 0 10px;
      text-decoration: none;
      border-right: 1px solid #666; /* Vertical line */
      padding: 10px 30px 10px 10px; /* Add padding */
      font-size: 18px; /* Increase font size */
      font-weight: bold; /* Make names bold */
    }
    .main-nav a:last-child {
      border-right: none; /* Remove border for last item */
    }
    .main-nav a:hover {
      color: #ccc; /* Change hover color if needed */
    }
    .search-box {
      display: none;
    }
    .search-icon {
      color: green; /* Change search icon color */
    }
    .navbar-toggler-icon {
      background-color: #fff !important;
    }
    /* Add additional styles for the section */
    .section {
      padding: 20px;
      background-color: #f8f9fa; /* Example background color */
       height: 400px;
    }
    /* Custom styles for columns */
    .col-custom {
      background-color: #f8f9fa; /* Column background color */
      padding: 15px;
      height: auto; /* Auto height */
    }
    .wrap {
      width: 100%;
      margin-left: auto;
      margin-right: auto;
      overflow: hidden;
      height: 400px;
    }
    header {
      width: 20%;
      float: left;
      background: #333;
      position: relative;
      height: 400px;
    }
    p {
      padding: 20px;
      text-align: center;
      color: #fff;
      font-family: 'Coming Soon', cursive;
      font-size: 16px;
    }
    section {
      float: left;
      width: 16%;
      overflow: hidden;
      height: 600px;
      transition: width 1s ease-in-out;
    }
    /* Colors */
    .one { background: #D4D4D4; }
    .two { background: #E9E7E7; }
    .three { background: #D4D4D4; }
    .four { background: #E9E7E7; }
    .five { background: #D4D4D4; }
    /* For JS */
    /* For JS */
/* For JS */
    .opendiv {
    width: 60%;
    }

    .closediv {
    width: 5%;
    }

    .details {
    float: left;
    width: 30%;
    padding-right: 10px;
    }

    .form {
    float: left;
    width: 40%;
    }


    .closediv:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav mr-auto">
      <!-- Profile -->
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
    </ul>
    <a class="navbar-brand" href="#"><img src="{{ asset('/upload/titan.png') }}" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0 search-box">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <a class="btn btn-outline-light my-2 my-sm-0" id="searchIcon" href="#"><i class="fas fa-search search-icon"></i></a>
      </form>
    </div>
  </nav>

  <!-- Main Navigation -->
  <div class="main-nav">
    <a href="#"><i class="fas fa-desktop"></i> <b>Service</b></a>
    <a href="#"><i class="fas fa-bell"></i> <b>Alarm</b></a>
    <a href="#"><i class="fas fa-hands-helping"></i> <b>Support</b></a>
    <a href="#"><i class="fas fa-cogs"></i> <b>System</b></a>
  </div>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="wrap">
      <header><p>This column is static, click on the colors to see the accordion.</p></header>



       <section class="one">
  <h2>Devices</h2>
  <div class="content">
    <div class="details">
      <!-- Details for devices -->
      <p>RTMP input</p>
    </div>
    <div class="form" style="display: none;">
      <!-- Form for devices -->
      <label for="deviceInput">Device Input:</label>
      <input type="text" id="deviceInput" placeholder="Device input field">
    </div>
  </div>
</section>

<section class="two">
  <h2>Inputs</h2>
  <div class="content">
    <div class="details">
      <!-- Details for inputs -->
      <p>Input details</p>
    </div>
    <div class="form" style="display: none;">
      <!-- Form for inputs -->
      <label for="inputInput">Input Input:</label>
      <input type="text" id="inputInput" placeholder="Input input field">
    </div>
  </div>
</section>

<section class="three">
  <h2>Tracks</h2>
  <div class="content">
    <div class="details">
      <!-- Details for tracks -->
      <p>Track details</p>
    </div>
    <div class="form" style="display: none;">
      <!-- Form for tracks -->
      <label for="trackInput">Track Input:</label>
      <input type="text" id="trackInput" placeholder="Track input field">
    </div>
  </div>
</section>

<section class="four">
  <h2>Muxers</h2>
  <div class="content">
    <div class="details">
      <!-- Details for muxers -->
      <p>Muxer details</p>
    </div>
    <div class="form" style="display: none;">
      <!-- Form for muxers -->
      <label for="muxerInput">Muxer Input:</label>
      <input type="text" id="muxerInput" placeholder="Muxer input field">
    </div>
  </div>
</section>

<section class="five">
  <h2>Output</h2>
  <div class="content">
    <div class="details">
      <!-- Details for output -->
      <p>Output details</p>
    </div>
    <div class="form" style="display: none;">
      <!-- Form for output -->
      <label for="outputInput">Output Input:</label>
      <input type="text" id="outputInput" placeholder="Output input field">
    </div>
  </div>
</section>



    </div>
  </div>

  <!-- Your content goes here -->

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  {{-- <script>
    $(function() {
      $('section').click(function(){
        $(this).siblings('section').addClass("closediv").removeClass("opendiv");
        $(this).removeClass("closediv").addClass("opendiv");
      });    

      $('header').click(function(){
        $('section').removeClass("opendiv closediv");
      });
    });
  </script> --}}


  <script>
    $(function() {
    $('section').click(function(){
        $(this).siblings('section').addClass("closediv").removeClass("opendiv");
        $(this).removeClass("closediv").addClass("opendiv");
        // Toggle visibility of form content
        $(this).find('.form').toggle();
    });    

    $('header').click(function(){
        $('section').removeClass("opendiv closediv");
        // Hide input field when opendiv is closed
        $('.form').hide();
    });
    });

  </script>

  

</body>
</html>
