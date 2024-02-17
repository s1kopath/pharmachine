<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmachine</title>
    <link rel="icon" href="{!! asset('images/icon3.ico') !!}" />

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .login-bg {
            background: url("images/form4.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center login-bg">

    <main class="form-signin rounded" style="background: url('images/login-bg2.jpg');">
        @if (session()->has('success'))
            <div class="alert alert-success d-flex justify-content-between">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger d-flex justify-content-between">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif



        <form action="{{ route('login') }}" method="post">
            @csrf
            <img class="mb-4 bg-light" src="{{ url('images/logo2.png') }}" alt="" width="" height="57">

            <div class="form-floating">
                <input required name="email" type="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input required name="password" type="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
                <a class="d-flex justify-content-first text-decoration-none mb-2"
                    href="{{ route('forgetPassword.form') }}">Forgetten password?</a>
            </div>
            <button class="w-100 btn btn-lg btn-danger" type="submit">Login</button>
        </form>

        <div class="mt-3">
            <!-- Button trigger modal -->
        <a href="" class=" text-decoration-none text-muted" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Login Help
        </a>
        </div>
        {{-- <a href="{{ route('registration.form') }}" class=" btn mt-5 text-muted">Register</a> --}}
        <p class="mb-3 mt-2 text-muted">&copy; 2017–{{ date('Y') }}</p>
        {{-- <p class=" mb-3 text-muted">admin@gmail.com</p> --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Admin Email: admin@gmail.com</p>
                        <p>Admin Password: 12345678</p>
                        <p>==================================</p>
                        <p>Workers <strong>DEFAULT</strong> Password: <strong>[Their email]</strong></p>
                        <p>
                            <ol>
                                @foreach ($workers as $worker)
                                    <li>
                                        {{ $worker->name . " - " . $worker->email }}
                                        <button type="button" class="btn" onclick="putMeIn('{{ $worker->email }}')" data-bs-dismiss="modal">
                                            +
                                        </button>
                                    </li>
                                @endforeach
                            </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function putMeIn(email) {
            document.getElementById("floatingInput").value = email;
            document.getElementById("floatingPassword").value = email;
        }
    </script>


</body>

</html>
