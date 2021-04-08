@extends('backend.dashboard')
@section('content')


<div class="text-center mt-2">
    <a href="{{ route('manufacturing.order') }}" class="btn btn-info"> Create Manufractring Order </a>
</div>
<div class="container-fluid p-3">
    <table class="table table-striped table-info">
        <thead class="text-center">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Number</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Materials Status</th>
            <th scope="col">Start</th>
            <th scope="col">Finish</th>
            <th scope="col">Delivery</th>
            <th scope="col">Warehouse Lot</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>MO 0001</td>
            <td>Ashwagandha</td>
            <td>50 Bottles</td>
            <td>In progress</td>
            <td>Available</td>
            <td>02.11.21</td>
            <td>30.11.21</td>
            <td>02.12.21</td>
            <td>WS 0010</td>
            <td>
                <a class="btn btn-success" href="">View</a> ||
                <a class="btn btn-warning" href="">Update</a> ||
                <a class="btn btn-danger" href="">Delete</a>
            </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>MO 0001</td>
            <td>Ashwagandha</td>
            <td>50 Bottles</td>
            <td>In progress</td>
            <td>Available</td>
            <td>02.11.21</td>
            <td>30.11.21</td>
            <td>02.12.21</td>
            <td>WS 0011</td>
            <td>
                <a class="btn btn-success" href="">View</a> ||
                <a class="btn btn-warning" href="">Update</a> ||
                <a class="btn btn-danger" href="">Delete</a>
            </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>MO 0001</td>
            <td>Ashwagandha</td>
            <td>50 Bottles</td>
            <td>In progress</td>
            <td>Available</td>
            <td>02.11.21</td>
            <td>30.11.21</td>
            <td>02.12.21</td>
            <td>Ws 0012</td>
            <td>
                <a class="btn btn-success" href="">View</a> ||
                <a class="btn btn-warning" href="">Update</a> ||
                <a class="btn btn-danger" href="">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
</div>

@endsection
