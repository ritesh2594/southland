<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section style="background-color: #9A616D;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col col-xl-10">
                        <div class="m-2">
                            <a class="text-dark text-decoration-none" href="">
                                <i class='fas fa-arrow-left'></i>
                                Back To Portal</a>
                        </div>
                        <div class="row">
                            @if (count($errors->all()) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <p><b>Required Fields Missing!</b></p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="{{ asset('assets/images/login-page.jpg') }}" alt="login form"
                                        class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success fw-bold" role="alert">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            @method('post')
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <img src="{{ asset('assets/images/NCI-Logo.png') }}" class="img-fluid"
                                                    alt="" width="200" height="60px">
                                            </div>
                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                                Admin Panel account</h5>
                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" name="email"
                                                    class="form-control form-control-lg" placeholder="Email address" />
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="password" id="password" name="password"
                                                    class="form-control form-control-lg" placeholder="Password" />
                                                <span class="text-danger">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkbox">
                                                <label class="form-check-label" for="checkbox">
                                                    Show Password
                                                </label>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary p-2" type="submit">Login</button>
                                            </div>
                                        </form>
                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {
            $('#checkbox').on('change', function() {
                $('#password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
            });
        });
    </script>
</body>

</html>
