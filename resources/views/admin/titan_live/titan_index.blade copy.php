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
    <!-- Accordion -->
    <div id="accordion">
      <!-- Devices -->
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Devices
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <input type="text" class="form-control" placeholder="Device Input Field">
          </div>
        </div>
      </div>

      <!-- Inputs -->
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Inputs
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <input type="text" class="form-control" placeholder="Input Input Field">
          </div>
        </div>
      </div>

      <!-- Track -->
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Track
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <input type="text" class="form-control" placeholder="Track Input Field">
          </div>
        </div>
      </div>

      <!-- Muxers -->
      <div class="card">
        <div class="card-header" id="headingFour">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Muxers
            </button>
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body">
            <input type="text" class="form-control" placeholder="Muxers Input Field">
          </div>
        </div>
      </div>

      <!-- Output -->
      <div class="card">
        <div class="card-header" id="headingFive">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Output
            </button>
          </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
            <input type="text" class="form-control" placeholder="Output Input Field">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Your content goes here -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
