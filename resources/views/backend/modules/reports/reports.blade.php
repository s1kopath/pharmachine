@extends('backend.dashboard')
@section('content')

<link href="/css/schedule.css" rel="stylesheet">

    <div class="container">
        <div class="chart">
            <div class="chart-row chart-period">
                <div class="chart-row-item">
                </div>
                <span>Saturday</span>
                <span>Sunday</span>
                <span>Monday</span>
                <span>Tuesday</span>
                <span>Wednesday</span>
                <span>Thursday</span>
                <span>Friday</span>

            </div>
            <div class="chart-row chart-lines">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>



            <div class="chart-row">
                <div class="chart-row-item">1</div>
                <ul class="chart-row-bars">
                    <li class="chart-li-one li">PO 001: Ashwagandha</li>
                </ul>
            </div>
            <div class="chart-row">
                <div class="chart-row-item">2</div>
                <ul class="chart-row-bars">
                    <li class="chart-li-two-a li">PO 002: Boswellia</li>
                    <li class="chart-li-two-b li">PO 003: Triphala</li>
                </ul>
            </div>
            <div class="chart-row">
                <div class="chart-row-item">3</div>
                <ul class="chart-row-bars">
                    <li class="chart-li-three li">PO 004: Brahmi</li>
                </ul>
            </div>
            <div class="chart-row">
                <div class="chart-row-item">4</div>
                <ul class="chart-row-bars">
                    <li class="chart-li-four li">PO 005: Cumin</li>
                </ul>
            </div>
            <div class="chart-row">
                <div class="chart-row-item">5</div>
                <ul class="chart-row-bars">
                    <li class="chart-li-five li">PO 006: Turmeric</li>
                </ul>
            </div>
            <div class="chart-row">
                <div class="chart-row-item">6</div>
                <ul class="chart-row-bars">
                    <li class="chart-li-six li">PO 007: Licorice root</li>
                </ul>
            </div>
            <div class="chart-row">
                <div class="chart-row-item">7</div>
                <ul class="chart-row-bars">
                    <li class="chart-li-seven li">PO 008: Gensin</li>
                </ul>
            </div>

        </div>
    </div>



    {{-- chart --}}



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Daily Production</h1>
    </div>
    <div>
        <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1076" height="454"
            style="display: block; width: 1076px; height: 454px;"></canvas>
    </div>

@endsection
