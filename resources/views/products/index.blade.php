@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary float-right mb-3 text-white" href="{{ route('products.create') }}">
                Add New Product
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">quantity</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ $product->avatar }}" alt="{{ $product->brand }}" width="80px">
                            </td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->model }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <button class="btn btn-danger">
                                    Delete
                                </button>

                                <button class="btn btn-warning">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
