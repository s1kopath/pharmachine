@extends('backend.workerModules.workerDashboard')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <style>
                    .fit-image {
                        max-width: 200px;
                        max-height: 200px;
                        width: auto;
                        height: auto;
                        object-fit: contain;
                        display: block;
                        margin: auto;
                    }
                </style>
                @foreach ($products as $data)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="img-fluid fit-image" src="{{ url('/files/product/' . $data->image) }}" alt="">
                            <div class="card-body">
                                <h3>{{ $data->name }}</h3>
                                <p>{{ $data->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        {{-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                                    </div>
                                    <small class="text-muted">{{ $data->product_type }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
