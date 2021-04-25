<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block admin-sidebar sidebar collapse">
    <div class="position-sticky pt-3 ">
        <ul class="nav flex-column ">
            <li class="nav-item ">
                <a class="nav-link text-white" aria-current="page" href="{{ route('sch.dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('pd.dashboard') }}">
                    <span data-feather="alert-triangle"></span>
                    Production Demand
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('demo.dashboard') }}">
                    <span data-feather="alert-triangle"></span>
                    DEMO Demand
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('pp.dashboard') }}">
                    <span data-feather="edit"></span>
                    Production Planning
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" href="{{ route('rep.dashboard') }}">
                    <span data-feather="bar-chart-2"></span>
                   Production Reports
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" href="{{ route('product.listView') }}">
                    <span data-feather="square"></span>
                    Product
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('worker.list') }}">
                    <span data-feather="users"></span>
                    Worker
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('ws.dashboard') }}">
                    <span data-feather="tool"></span>
                    Workstation
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('raw.dashboard') }}">
                    <span data-feather="truck"></span>
                    Raw Materials
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="{{ route('sto.dashboard') }}">
                    <span data-feather="database"></span>
                    Warehouse Stock
                </a>
            </li>
        </ul>
    </div>
</nav>



