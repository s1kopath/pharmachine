@extends('backend.dashboard')
@section('content')


<div class="container-fluid p-3 bg-primary rounded">
    <h1 class="text-center text-light">Warehouse Stock</h1>
    <table class="table table-striped table-danger rounded">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Number</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Delevery</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Ws 0010</td>
            <td>Ashwagandha</td>
            <td>50 Bottles</td>
            <td>Ready for shipment</td>
            <td>02.12.21</td>

            <td>
                <a class="btn btn-warning" href="">Deliver</a> ||
                <a class="btn btn-success" href="">View Recipt</a> ||
                <a class="btn btn-danger" href="">Delete Record</a>
            </td>
          </tr>

          <tr>
            <th scope="row">1</th>
            <td>Ws 0013</td>
            <td>Cumin</td>
            <td>20 Boxes</td>
            <td>Ready for shipment</td>
            <td>06.09.21</td>

            <td>
                <a class="btn btn-warning" href="">Deliver</a> ||
                <a class="btn btn-success" href="">View Recipt</a> ||
                <a class="btn btn-danger" href="">Delete Record</a>
            </td>
          </tr>


          <tr>
            <th scope="row">1</th>
            <td>Ws 0016</td>
            <td>Licorice root</td>
            <td>50 Boxes</td>
            <td>Delevered</td>
            <td>16.02.21</td>

            <td>
                <a class="btn btn-warning" href="">Deliver</a> ||
                <a class="btn btn-success" href="">View Recipt</a> ||
                <a class="btn btn-danger" href="">Delete Record</a>
            </td>
          </tr>
        </tbody>
      </table>
</div>


@endsection
