@extends('backend.dashboard')
@section('content')



    <style>
        .box {
            height: 4em;
            text-align: left;
            border: 2px solid gray;
        }

        .card {
            margin-top: 2px;
            height: 10em;
            border: none;
        }

        .proceed {
            background-color: honeydew;
            border: block;
            border: 1px solid gray;
        }

        .act {
            color: rgb(255, 255, 255);
        }

    </style>


    <div class="">
        <h2 class="text-danger text-center">Production Demand</h2>
        <br>

        <div class="row">
            <div class="col box">Recieved Demand <br> Orders: 01</div>
            <div class="col box">Waiting for Confirmation <br> Orders: 00</div>
            <div class="col box">Confirmed <br> Orders: 00</div>
            <div class="col box">Waiting for Production <br> Orders: 02</div>
            <div class="col box">In Production <br> Orders: 30</div>
            <div class="col box">Ready for Shipment <br> Orders: 01</div>
        </div>


        <div class="row">
            <div class="col card proceed">
                <div>
                    <h5>Ashwagandha</h5>
                    <h6>Quantity: 50 Bottles</h6>
                    <p>Delevary date: 02.12.21</p>
                </div>
                <a href="#" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to confirm ></a>
            </div> {{-- 1 of 30 --}}
            <div class="col card act">2</div> {{-- 2 of 30 --}}
            <div class="col card act">3</div> {{-- 3 of 30 --}}
            <div class="col card proceed">
                <div>
                    <h5>Boswellia</h5>
                    <h6>Quantity: 4500 Boxes</h6>
                    <p>Delevary date: 15.06.21</p>
                </div>
                <a href="#" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to production ></a>
            </div> {{-- 4 of 30 --}}
            <div class="col card proceed">
                <div>
                    <h5>Triphala</h5>
                    <h6>Quantity: 2300 Boxes</h6>
                    <p>Delevary date: 25.06.21</p>
                </div>
                <a href="#" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to shipment ></a>
            </div> {{-- 5 of 30 --}}
            <div class="col card proceed">
                <div>
                    <h5>Cumin</h5>
                    <h6>Quantity: 20 Boxes</h6>
                    <p>Delevary date: 05.03.21</p>
                </div>
                <a href="#" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to delevary ></a>
            </div> {{-- 6 of 30 --}}
        </div>
        <div class="row">
            <div class="col card act">7</div> {{-- 7 of 30 --}}
            <div class="col card act">8</div> {{-- 8 of 30 --}}
            <div class="col card act">9</div> {{-- 9 of 30 --}}
            <div class="col card proceed">
                <div>
                    <h5>Licorice root</h5>
                    <h6>Quantity: 20 Boxes</h6>
                    <p>Delevary date: 22.05.21</p>
                </div>
                <a href="#" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to production ></a>
            </div> {{-- 10 of 30 --}}
            <div class="col card proceed">
                <div>
                    <h5>Turmeric</h5>
                    <h6>Quantity: 120 Bottles</h6>
                    <p>Delevary date: 09.06.21</p>
                </div>
                <a href="#" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to shipment ></a>
            </div> {{-- 11 of 30 --}}
            <div class="col card act">12</div> {{-- 12 of 30 --}}
        </div>
        <div class="row">
            <div class="col card act">13</div> {{-- 13 of 30 --}}
            <div class="col card act">14</div> {{-- 14 of 30 --}}
            <div class="col card act">15</div> {{-- 15 of 30 --}}
            <div class="col card act">16</div> {{-- 16 of 30 --}}
            <div class="col card proceed">
                <div>
                    <h5>Boswellia</h5>
                    <h6>Quantity: 20 Bottles</h6>
                    <p>Delevary date: 06.07.21</p>
                </div>
                <a href="#" class="btn btn-sm btn-info" style="background-color: honeydew;">Proceed to shipment ></a>
            </div> {{-- 17 of 30 --}}
            <div class="col card act">18</div> {{-- 18 of 30 --}}
        </div>
        <div class="row">
            <div class="col card act">19</div> {{-- 19 of 30 --}}
            <div class="col card act">20</div> {{-- 20 of 30 --}}
            <div class="col card act">21</div> {{-- 21 of 30 --}}
            <div class="col card act">22</div> {{-- 22 of 30 --}}
            <div class="col card act">23</div> {{-- 23 of 30 --}}
            <div class="col card act">24</div> {{-- 24 of 30 --}}
        </div>
        <div class="row">
            <div class="col card act">25</div> {{-- 25 of 30 --}}
            <div class="col card act">26</div> {{-- 26 of 30 --}}
            <div class="col card act">27</div> {{-- 27 of 30 --}}
            <div class="col card act">28</div> {{-- 28 of 30 --}}
            <div class="col card act">29</div> {{-- 29 of 30 --}}
            <div class="col card act">30</div> {{-- 30 of 30 --}}
        </div>

    @endsection
