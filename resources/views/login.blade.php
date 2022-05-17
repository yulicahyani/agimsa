<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">
    @push('styles')
    <link href="{{ asset('css/login-style.css') }}" rel="stylesheet">
    @endpush

    @stack('styles')
    <title>Agimsa | Login</title>
</head>

<body style="background-color: rgb(252, 252, 252);">

    <div class="container mt-1">
        <div class="row justify-content-center mt-5 ml-5 mr-5">            
        </div>
        <div class="row justify-content-center">
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last"
                                    style="background:linear-gradient(0deg, rgba(25, 98, 255, 0.6), rgba(28, 124, 250, 0.6)), url({{ asset('img/bg3.jpg') }});  background-size:cover;">
                                    <div class="text">
                                        <h2>Welcome to Login</h2>
                                        <p>Lets login to your account</p>
                                    </div>
                                </div>
                                <div class="login-wrap p-4 p-lg-5">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="mb-4">CV. AGIMSA</h3>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{session('loginError')}}
                                        </div>
                                        @endif
                                        @if (session()->has('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            {{session('success')}}
                                        </div>
                                        @endif
                                    </div>
                                    <form action="{{route('login.authenticate')}} " class="signin-form" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="label" for="name">Username</label>
                                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="password">Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" onclick="showPass()"> Show Password
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="form-control btn submit px-3"
                                                style="background-color: #0d6efd; color:white;">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script>
        function showPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
    
</body>

</html>
