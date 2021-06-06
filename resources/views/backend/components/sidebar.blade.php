<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block admin-sidebar sidebar collapse">
    <div class="position-sticky pt-3">
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
                    Production Demand @if ($demand_count)
                        <span class="badge bg-danger rounded-pill">{{ $demand_count }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('pp.dashboard') }}">
                    <span data-feather="edit"></span>
                    Production Planning @if ($count_order)
                        <span class="badge bg-danger rounded-pill">{{ $count_order }}</span>
                    @endif
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

            <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('ws.dashboard') }}">
                    <span data-feather="tool"></span>
                    Workstation @if ($workstation)
                        <span class="badge bg-danger rounded-pill">{{ $workstation }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('raw.dashboard') }}">
                    <span data-feather="truck"></span>
                    Raw Herbs @if ($count_material)
                        <span class="badge bg-danger rounded-pill">{{ $count_material }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="{{ route('sto.dashboard') }}">
                    <span data-feather="database"></span>
                    Warehouse Stock @if ($count_shipment)
                        <span class="badge bg-danger rounded-pill">{{ $count_shipment }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" aria-current="page" href="{{ route('show.calendar') }}">
                    <span data-feather="database"></span>
                    Production Calendar @if ($count_shipment)
                        <span class="badge bg-danger rounded-pill">{{ $count_shipment }}</span>
                    @endif
                </a>
            </li>
        </ul>
    </div>
    <div class="mt-5">
        <h1>Today is,</h1>
        <h4 id="myDateDisplay" class="date text-light d-flex justify-content-end m-2" onload="today()"></h4>
    </div>
    <div class="p-2 d-flex justify-content-between">
        <h2>Time: </h2>
        <h3 id="myClockDisplay" class="clock text-light " onload="showTime()"></h3>
    </div>


</nav>
