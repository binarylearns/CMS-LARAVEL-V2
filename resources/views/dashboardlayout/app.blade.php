<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            position: fixed;
            width: 220px;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            border-radius: 5px;
        }

        /* Main content */
        .main-content {
            margin-left: 220px; /* same as sidebar width */
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mycms</a>

        <div class="d-flex ms-auto">
            <!-- Username Dropdown -->
            @auth
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        {{-- Optional Profile link if you create a route --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('customprofile.edit') }}">
                                <i class="fas fa-user me-2"></i> Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>

                    <!-- Logout form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </div>ProfileController
</nav>

  <!-- Nabvbar end here -->



   <!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-white text-center mb-4">DASHBOARD</h4>

    <a href="{{ route('dashboard') }}" 
       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
       <i class="fas fa-tachometer-alt me-2"></i> Dashboard
    </a>

    <a href="{{ route('posts.create') }}" 
       class="{{ request()->routeIs('posts.create') ? 'active' : '' }}">
       <i class="fas fa-plus me-2"></i> Create Post
    </a>

 

    <a href="#" 
       class="{{ request()->routeIs('posts.index') ? 'active' : '' }}">
       <i class="fas fa-eye me-2"></i> Views
    </a>

    <!-- Logout -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <a href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>
</div>


    <!-- Sidebarends here -->

    <!-- Main content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
