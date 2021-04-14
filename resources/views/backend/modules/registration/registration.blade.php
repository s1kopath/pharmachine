<!doctype html>
<html lang="en">

<head>
    <title>Pharmachine</title>
    <link rel="icon" href="{!! asset('images/icon3.ico') !!}" />
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-bg {
            background: url("images/form6.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">

</head>

<body class="text-center login-bg">


    <main class="form-signin bg-light rounded">

        <form action="{{ route('registration') }}" method="post">
            @csrf
            <h3>Register a New User</h3>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif


            <div class="mb-3">
                <label for="name" class="form-label">Name: </label>
                <input required type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address: </label>
                <input name="email" required type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password: </label>
                <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <a href="{{ route('login.form') }}" class="btn btn-success m-3 ">Sign In</a>
            <button type="submit" class="btn btn-info">Sign Up</button>

        </form>

    </main>



</body>

</html>
