@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="brand">Brand:</label>
                    <input type="text"
                        class="form-control"
                        id="brand"
                        name="brand"
                        value="{{ $product->brand }}"
                    >
                </div>

                <div class="form-group">
                    <label for="model">Model:</label>
                    <input type="text"
                        class="form-control"
                        id="model"
                        name="model"
                        value="{{ $product->model }}"
                    >
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text"
                        class="form-control"
                        id="quantity"
                        name="quantity"
                        value="{{ $product->quantity }}"
                    >
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="avatar">Avatar:</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                    </div>

                    <div class="col-6">
                        <img src="/storage/{{ $product->avatar }}" width="80px">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
