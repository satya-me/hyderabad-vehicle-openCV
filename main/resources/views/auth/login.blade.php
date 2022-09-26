<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .sign_in_btn {
            display: inline-block;
            padding: 0.5rem 2rem;
            background: rgb(77, 131, 255);
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        .sign_in_btn:hover {
            color: #fff;
        }

        .auth .brand-logo {
            margin-bottom: 2rem;
            text-align: center;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/main/public') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('/main/public') }}/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/main/public') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/main/public') }}/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('/main/public') }}/images/International_Institute_of_Information_Technology,_Hyderabad_logo.png" alt="logo">
                            </div>
                            <h4 class="text-center">Hello! let's get started</h4>
                            <h6 class="font-weight-light text-center">Sign in to continue.</h6>
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mt-3 text-center">

                                    <button class="sign_in_btn" type="submit">Sign In</button>
                                    {{-- <a href="{{ asset('/main/public') }}/index.html" class="sign_in_btn">Sign In</a> --}}
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/main/public') }}/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('/main/public') }}/js/off-canvas.js"></script>
    <script src="{{ asset('/main/public') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('/main/public') }}/js/template.js"></script>
    <!-- endinject -->
</body>

</html>