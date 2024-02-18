@extends('backend/modules/product/product')
@section('productView')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($products as $data)
                    <div class="col">
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
                        <div class="card shadow-sm">
                            <img class="img-fluid fit-image" style="max-height: 200px; weight: auto;"
                                src="{{ url('/files/product/' . $data->image) }}" alt="product">

                            <div class="card-body">
                                <h3>{{ $data->name }}</h3>
                                <p>{{ $data->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('product.update', $data['id']) }}" type="button"
                                            class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <a type="button" href="{{ route('product.delete', $data['id']) }}"
                                            class="btn btn-sm btn-outline-secondary">Delete</a>
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
