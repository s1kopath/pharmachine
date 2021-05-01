@extends('backend.workerModules.workerDashboard')
@section('content')

{{-- Table --}}
<div class="container mt-3 form-control bg-dark">
    <table class="table table-info table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Workstation Name</th>
                <th scope="col" style="width: 30%">Description</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workstations as $key=>$data)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->description }}</td>
                <td>{{ $data->manufacturer }}</td>
                <td>{{ $data->status }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>



@endsection
