<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="{{asset('assets/images/login-page.jpg')}}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <form action="{{ route('register')}}" method="POST">
                                            @csrf
                                            @method('post')
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <img src="{{ asset('assets/images/NCI-Logo.png') }}" class="img-fluid" alt="" width="200" height="60px">
                                            </div>
                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h5>
                                            <div class="form-outline mb-4">
                                                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Name" value="{{ old('name') }}" required />
                                                <span class="text-danger">
                                                    @error('name')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email address" value="{{ old('email') }}" required />
                                                <span class="text-danger">
                                                    @error('email')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                                                <span class="text-danger">
                                                    @error('password')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" required />
                                                <span class="text-danger">
                                                    @error('confirm_password')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary p-2" type="submit">Register</button>
                                            </div>
                                        </form>
                                        <p>Already Register ?<a class="small text-muted" href="{{ route('login') }}"> Click here</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>