@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flesh-messages');
    
    <div class="row">
        <div class="col-6">
            <h1><i class="fa-solid fa-list"></i> Lista produktów</h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('products.create') }}">
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
            </a>
        </div>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Opis</th>
            <th scope="col">Kategoria</th>
            <th scope="col">Ilość</th>
            <th scope="col">Cena</th>
            <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>@if($product->hasCategory()){{ $product->category->name }} @endif</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        <button class="btn btn-primary btn-sm" data-id="{{ $product->id }}"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </a> 
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">
                        <button class="btn btn-success btn-sm" data-id="{{ $product->id }}"><i class="fa-solid fa-pen"></i></button>
                    </a> 
                </td>
                    <td><button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}"><i class="fa-solid fa-trash"></i></button></td>
                </tr>

            @endforeach
        </tbody>
        </table>
    </div>
    {{ $products->links() }}
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('products') }}/"
@endsection
@section('js-file')
<script src="{{asset('js/delete.js')}}"></script>
@endsection
