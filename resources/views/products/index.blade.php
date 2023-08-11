@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="text-right">
            <a href="/product/create" class="btn btn-dark mt-2 ">New Product</a>
        </div>
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tbody>
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        
                        <td> <a href="products/{{ $product->id }}/show" class="text-dark">{{ $product->name }}</a></td>
                        <td>{{ $product->description }}</td>

                        <td><img src="products/{{ $product->image }}" class="rounded-circle" width="50"height="50"></td>
                        <td>
                            <a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                            <form action="products/{{ $product->id }}/delete" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{ $products->links() }}
    </div>
@endsection
