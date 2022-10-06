<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NextCode Southland</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary pe-3">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/nextcode-white-logo.png') }}" class="img-fluid" alt="" width="200" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0 px-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link  text-light fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login <i class="fas fa-user-circle ms-2 fs-4"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-primary" href="{{route('login')}}"> <i class="fas fa-lock"></i> Login</a></li>
                            {{-- <li><a class="dropdown-item text-primary" href=""><i class='fas fa-user-plus'></i> Register</a></li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-center mt-3 mt-3">
                <img src="{{ asset('assets/images/southland_dark.png') }}" class="img-fluid" style="width: 300px;">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 text-center mt-3">
                <img src="{{ asset('assets/images/general-icon.png') }}" class="mb-3" alt="" height="80">
                <h3 class="fw-normal">General</h3>
            </div>
            <div class="col-md-4 text-center mt-3">
                <img src="{{ asset('assets/images/form-icon.png') }}" class="mb-3" alt="" height="80">
                <h3 class="fw-normal">FORMS</h3>
            </div>
            <div class="col-md-4 text-center mt-3">
                <img src="{{ asset('assets/images/safety.png') }}" class="mb-3" alt="" height="80">
                <h3 class="fw-normal">
                    SAFETY
                </h3>
            </div>
        </div>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-sm-4 mt-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card" style="min-height:100px ;">
                            <a href="{{route('register')}}" class="btn btn-block p-3">
                                <i class="fas fa-folder-plus fs-1 text-danger"></i>
                                <p class="card-title font-weight-normal my-1">NEW APPLICATION</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card" style="min-height:100px ;">
                            <a href="{{route('login')}}" class="btn btn-block p-3">
                                <i class="fas fa-user-shield fs-1 text-danger"></i>
                                <p class="card-title font-weight-normal my-1">ADMIN LOGIN</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-3">
                <div class="card">
                    <a href="{{route('near-miss')}}" class="btn btn-block p-3">
                        <i class="fas fa-tasks fs-1 text-primary"></i>
                        <p class="card-title font-weight-normal my-1">Near Miss</p>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 mt-3">
                <div class="card">
                    <a href="" class="btn btn-block p-3">
                        <i class="fas fa-certificate fs-1 text-success"></i>
                        <p class="card-title font-weight-normal my-1">SAFETY SIGNIN</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>