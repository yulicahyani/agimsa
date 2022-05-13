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
    <title>Agimsa | Login</title>
</head>

<body style="background-color: rgb(156, 156, 156);">

    <div class="container mt-5">
        <div class="row justify-content-center mt-5 ml-5 mr-5">
            <div style="width: 25rem;">
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
        </div>
        <div class="row justify-content-center">
            <div class="card text-center" style="width: 25rem; padding:0">
                <div class="card-header bg-dark">
                    <h5 class="text-light p-1">Login | CV.AGIMSA</h5>
                </div>
                <div class="card-body">
                    <form class="" method="POST" action="{{ route('login.authenticate')}}">
                        @csrf
                        <div class="input-group mb-3 mt-5">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                aria-label="Username" aria-describedby="basic-addon2" required>
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                        </div>
                        <div class="row justify-content-end mt-4">
                            <div class="col-md-4">
                                <button class="btn btn-warning" type="submit">Sign in</button>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-2">
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted pd-5 bg-dark">
                    <h5 class="p-1 text-dark">.</h5>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
