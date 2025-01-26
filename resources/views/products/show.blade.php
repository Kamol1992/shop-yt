@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Podgląd produktu</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Nazwa</label>

                        <div class="col-md-6">
                            <input id="name" type="text" maxlength="500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name}}" disabled>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Opis</label>

                        <div class="col-md-6">
                            <textarea id="description" type="text" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="description" disabled>{{ $product->description }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="amount" class="col-md-4 col-form-label text-md-end">Ilość</label>

                        <div class="col-md-6">
                            <input id="amount" type="number" min="0" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $product->amount }}" disabled>

                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">Cena</label>

                        <div class="col-md-6">
                            <input id="price" type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" disabled>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.create.category')}}</label>

                        <div class="col-md-6">
                            <select id="category" type="number"class="form-control @error('category_id') is-invalid @enderror" name="category_id" disabled>
                                @if($product->hasCategory())
                                    <option value="" >{{$product->category->name}}</option>
                                @else
                                    <option value="">Brak</option>
                                @endif
                                
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
