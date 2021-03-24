<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-info  sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column ">
            <li class="nav-item ">
                <a class="nav-link active text-white" aria-current="page" href="{{ '/' }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('emp.dashboard') }}">
                    <span data-feather="home"></span>
                    Employee
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('ws.dashboard') }}">
                    <span data-feather="home"></span>
                    Workstation
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" href="{{ route('pl.dashboard') }}">
                    <span data-feather="home"></span>
                    Product Listing
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('pd.dashboard') }}">
                    <span data-feather="home"></span>
                    Production Demand
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="{{ route('mpp.dashboard') }}">
                    <span data-feather="home"></span>
                    My Production Plan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('pp.dashboard') }}">
                    <span data-feather="home"></span>
                    Production Planning
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="{{ route('sto.dashboard') }}">
                    <span data-feather="home"></span>
                    Stock
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('pro.dashboard') }}">
                    <span data-feather="file"></span>
                    Procurement
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link  text-white" href="{{ route('rep.dashboard') }}">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
        </ul>
    </div>
</nav>



