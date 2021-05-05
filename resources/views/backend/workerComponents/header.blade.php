<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #06864a">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-light rounded" href="#"><img
            style="width: 60%; margin-left: 2em;" src="{{ url('images/logo2.png') }}" alt=""></a>

        <button class="btn text-light" onclick="window.print()"><span data-feather="printer"></span></button>
    <ul class="navbar-nav px-3 ">
        <li class="nav-item ">
            @auth()
                <a href="{{ route('display.UserProfile') }}" style=" text-decoration: none;">

                    <span style="color:white;" data-feather="user"></span>
                    <span style="color:white; margin-right: 30px;">{{ auth()->user()->name }} </span>
                </a>
                <a class="btn btn-danger" href="{{ route('logout') }}"> Logout</a>

            @else
                <a class="btn btn-info" href="{{ route('login.form') }}">Login</a>

            @endauth

        </li>
    </ul>
</header>
