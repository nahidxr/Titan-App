<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



    <li class="nav-item">
    <a href="{{ url('#') }}" class="nav-link">
        <i class="fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link">
        <i class="fa fa-plus-circle"></i>
            <p>
           Titan Live
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <li class="nav-item">
            <a href="{{ url('/titan/view') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Video Transcoding List</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/titan/create') }}" class="nav-link">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Add Video Perameter</p>
            </a>
            </li>
            
        </ul>
     </li>





    </ul>
  </nav>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".settings-options").hide();

    $(".toggle-settings").click(function(e) {
        e.preventDefault();
        $(this).next(".settings-options").slideToggle();
    });
});
</script>

