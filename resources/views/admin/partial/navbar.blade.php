{{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
        width="60">
</div> --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown mt-2">
                <span class="badge badge-warning" data-toggle="dropdown">Logout</span>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <img src="{{ asset('assets/images/southland_dark.png') }}" class="img-fluid" style="width: 300px;">
                <div class="dropdown-divider mt-5">
                </div>
                <div class="d-flex justify-content-between m-2">
                    <a class="btn btn-primary" href="#" role="button">Profile</a>
                    <a class="btn btn-danger" href="{{ route('logout') }}" role="button">Logout</a>
                </div>
            </div>
        </li>
    </ul>
</nav>
