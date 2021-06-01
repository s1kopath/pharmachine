@extends('backend.adminHome')

@section('content')
    <style>
        .profile-head {
            transform: translateY(5rem)
        }

        .cover {
            background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
            background-size: cover;
            background-repeat: no-repeat
        }

        body {
            background: #654ea3;
            background: linear-gradient(to right, #e96443, #904e95);
            min-height: 100vh
        }

    </style>


    <div class="row  ">
        <div class="col mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-5 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3 text-center"><img style="width: 25%;"
                            @if (!$workers->image) src="https://bootdey.com/img/Content/avatar/avatar7.png"
                            @else src="{{ url('/files/worker/' . $workers->image) }}" @endif
                                alt="..." class="rounded mb-2 img-thumbnail"></div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-3">{{ $users-> name }}</h4>
                            <small>Production Worker</small> <span class="float-end">{{ $workers-> gender }}</span>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-0">Details</h5>
                    <div class="row p-4 rounded shadow-sm bg-light">
                        <div class="col">
                            <p class="font-italic ">Email: {{ $users-> email }}</p>
                            <p class="font-italic ">Address: {{ $workers-> address }}</p>
                            <p class="font-italic ">Contact: {{ $workers-> contact }}</p>
                            <p class="font-italic ">Age: {{ $workers->age }} Years</p>
                        </div>
                        <div class="col">
                            <p class="font-italic ">Date of birth: {{ $workers->date_of_birth }}</p>
                            <p class="font-italic ">Joined on: {{ $workers-> joining_date }}</p>
                            <p class="font-italic ">Monthly Salary: {{ $workers-> salary }} BDT</p>
                            <p class="font-italic ">Labour per hour: {{ $workers-> labour_per_hour }} BDT</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('worker.list') }}" class="btn w-100">Go Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
