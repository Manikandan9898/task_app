<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu > .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }

    .dropdown-submenu:hover > .dropdown-menu {
      display: block;
    }

    .dropdown-submenu > a::after {
      float: right;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Task App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <!-- Masters -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="mastersDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">Masters</a>
            <ul class="dropdown-menu" aria-labelledby="mastersDropdown">
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#">Master</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('owner_master')}}">Owner</a></li>
                  <li><a class="dropdown-item" href="{{route('company_master')}}">Company</a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="{{route('vehicle_master')}}">Add Vehicle</a></li>
            </ul>
          </li>

          <!-- Vehicle -->
          <li class="nav-item">
            <a class="nav-link" href="{{route('vehicle.filter')}}">Vehicle List</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-5">
    @yield('content')
  </div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Page-specific scripts will be injected here -->
  @yield('scripts')

</body>
</html>
