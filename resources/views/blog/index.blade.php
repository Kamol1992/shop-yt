@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div>
        <h1 class="mb-4">Lista Blogów</h1>
    </div>
    <div class="text-end p-4">
        <a href="{{ route('blog.create') }}">
            <button type="button" class="btn btn-primary">Dodaj nowy wpis</button>
        </a>
    </div>
    @foreach ($blog as $b)
    <div class="card mb-3" >
        <div class="row g-0">
            <div class="col-md-4">
                @if (!is_null($b->image_path))
                      <img src="{{ asset('storage/'. $b->image_path) }}" class="img-fluid mx-auto d-block" alt="Product image">
                @else
                      <img src="{{ asset('storage/Empty_picture.jpg') }}" class="img-fluid mx-auto d-block" alt="Empty-image">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $b->title }}</h5>
                    <p class="card-text">{{ $b->description }}</p>
                    <a href="{{ route('blog.edit', $b->id) }}">
                        <button class="btn btn-primary btn-sm" data-id="{{ $b->id }}">Edytuj wpis</button>
                    </a>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $b->id }}">Usuń wpis</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Więcej kart blogów można dodać tutaj -->

</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('blog') }}/"
@endsection
@section('js-file')
<script src="{{asset('js/delete.js')}}"></script>
@endsection
