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
                    Production Reporting
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
                    Workstation
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-dark worker-link" href="{{ route('show.materials') }}">
                    <span class="text-dark" data-feather="database"></span>
                    Raw Materials
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-dark worker-link" aria-current="page" href="{{ route('show.stock') }}">
                    <span class="text-dark" data-feather="truck"></span>
                    Warehouse Stock
                </a>
            </li>





        </ul>
    </div>
</nav>



