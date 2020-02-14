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
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="/storage/{{ $product->avatar }}" alt="{{ $product->brand }}" width="80px">
                            </td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->model }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                    class="btn btn-warning"
                                >
                                    Edit
                                </a>

                                <form action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                    method="POST"
                                    class="d-inline pointer">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-danger"
                                        onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }"
                                    >
                                        Delete
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <h4>
                                    No products found.
                                </h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
