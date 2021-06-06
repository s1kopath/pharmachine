<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar  worker-sidebar collapse">
    <div class="position-sticky pt-3 ">
        <ul class="nav flex-column ">
            <li class="nav-item ">
                <a class="nav-link text-dark worker-link" aria-current="page" href="{{ route('show.home') }}">
                    <span class="text-dark" data-feather="home"></span>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-dark worker-link" href="{{ route('show.reporting') }}">
                    <span class="text-dark" data-feather="alert-triangle"></span>
                    Production Reporting @if ($countRequest)
                        <span class="badge bg-danger rounded-pill">{{ $countRequest }}</span>
                    @endif
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link  text-dark worker-link" href="{{ route('show.product') }}">
                    <span class="text-dark" data-feather="square"></span>
                    Product
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-dark worker-link" href="{{ route('show.workstation') }}">
                    <span class="text-dark" data-feather="tool"></span>
                    Workstation @if ($countMachineRepair)
                        <span class="badge bg-danger rounded-pill">{{ $countMachineRepair }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-dark worker-link" href="{{ route('show.materials') }}">
                    <span class="text-dark" data-feather="database"></span>
                    Raw Herbs @if ($countMaterialOrder)
                        <span class="badge bg-danger rounded-pill">{{ $countMaterialOrder }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-dark worker-link" aria-current="page" href="{{ route('show.stock') }}">
                    <span class="text-dark" data-feather="truck"></span>
                    Warehouse Stock @if ($countDelivery)
                        <span class="badge bg-danger rounded-pill">{{ $countDelivery }}</span>
                    @endif
                </a>
            </li>





        </ul>

    </div>

    <div class="mt-5 ">
        <h1 class="text-secondary">Today is,</h1>
        <h4 id="myDateDisplay" class="date text-light d-flex justify-content-end m-2" onload="today()"></h4>
    </div>
    <div class="p-2 d-flex justify-content-between">
        <h2 class="text-secondary">Time: </h2>
        <h3 id="myClockDisplay" class="clock text-light " onload="showTime()"></h3>
    </div>
</nav>
