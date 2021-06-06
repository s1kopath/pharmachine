<!doctype html>
<html lang="en">

<head>
    <title>Pharmachine</title>
    <link rel="icon" href="{!! asset('images/icon3.ico') !!}" />
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-bg {
            background: url("https://media.istockphoto.com/photos/blue-abstract-background-or-texture-picture-id1138395421?k=6&m=1138395421&s=612x612&w=0&h=bJ1SRWujCgg3QWzkGPgaRiArNYohPl7-Wc4p_Fa_cyA=");
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
    @if (session()->has('success'))
        <div class="alert alert-info d-flex justify-content-between">
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


    <main class="form-signin bg-light rounded">
        <img class="" src="{{ url('https://www.aligned-tec.com/upload/20201123/202011230915091439.png')}}" alt="" >
        <form action="{{ route('password.submit') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $token }}" name="token">
            <input type="hidden" value="{{ $email }}" name="email">
                <div class="form-floating">
                    <label>Enter New Password:</label>
                    <input type="password" required name="password" class="form-control" placeholder="*********" id="">
                </div>
                <div class="form-floating ">
                    <label>Re-enter Password:</label>
                    <input type="password" required name="password_confirmation" class=" form-control"
                        placeholder="*********" id="">
                </div>
            <button type="submit" class="btn btn-info w-100 mt-2">Submit</button>

        </form>

    </main>

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
