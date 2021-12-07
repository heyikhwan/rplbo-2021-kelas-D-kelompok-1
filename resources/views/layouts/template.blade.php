<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  @include('partials.style')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('partials.navbar')

   @include('partials.sidebar')

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <h1 class="m-0">@yield('title')</h1>
        </div>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>

    @include('partials.footer')
  </div>

  <!-- SCRIPTS -->
  @include('partials.script')
</body>

</html>