<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="d-flex">
          <div class="font-weight-bold">{{ Auth::user()->name }}</div>
          <div class="d-flex align-items-center justify-content-center badge badge-primary mx-3">{{ Auth::user()->roles[0]->name }}</div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->