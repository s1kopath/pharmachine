@extends('backend.workerModules.workerDashboard')
@section('content')

@if (session()->has('success'))
        <div class="alert alert-info d-flex justify-content-between">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

{{-- Table --}}
<div class="container mt-3">
    <table class="table table-hover table-responsive shadow-lg">
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
            @php
                $temp = '';
            @endphp

            @foreach ($workstations as $key=>$data)
            <tr>
                @if ($data->workstation_id == $temp)
                    @continue
                @endif

                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $data->manufacturingWorkstation->name }}</td>
                <td>{{ $data->manufacturingWorkstation->description }}</td>
                <td>{{ $data->manufacturingWorkstation->manufacturer }}</td>
                <td>{{ $data->manufacturingWorkstation->status }} @if ($data->manufacturingWorkstation->status == 'Waiting for repair')
                    <hr>
                    <a href="{{ route('repair.workstation',$data->manufacturingWorkstation->id) }}" class="btn btn-sm btn-warning">Report repair done</a>
                @endif</td>

                @php
                    $temp = $data->workstation_id;
                @endphp
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
