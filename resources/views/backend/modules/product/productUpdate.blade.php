@extends('backend.dashboard')
@section('content')

    <!-- Modal -->
    <form method="post" action="{{ route('product.saveUpdate', $products['id']) }}">
        @csrf
        @method('put')

        <div class="form-control container bg-warning text-light">
            <div class="form-group">
                <label>Enter Product Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $products['name'] }}" id=""
                    placeholder="Name">
            </div>
            <br>
            <div class="form-group">
                <label>Select Product Type:</label>
                <select class="form-control" name="product_type" value="{{ $products['product_type'] }}" id="">
                    <option value="none">(none)</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Syrup">Syrup</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Enter Description:</label>
                <input name="description" type="text" class="form-control" value="{{ $products['description'] }}" id=""
                    placeholder="Description">
            </div>
            <br>
            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control" value="{{ $products['image'] }}" src="" id="">
            </div>


            <div class="modal-footer">
                <a class="btn btn-secondary" href="{{ route('product.list') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

@endsection
