@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="brand">Brand:</label>
                    <input type="text" class="form-control" id="brand" name="brand">
                </div>

                <div class="form-group">
                    <label for="model">Model:</label>
                    <input type="text" class="form-control" id="model" name="model">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity">
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>

                <div class="mt-5">
                    <a href="{{ route('products.index') }}" class="btn btn-danger">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-success">
                        Add New
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
