@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodawanie Wpisu</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blog.update', $blog->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Tytuł</label>

                            <div class="col-md-6">
                                <input id="title" type="text" maxlength="500" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $blog->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="description" autofocus>{{ $blog->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Grafika</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                            @if(!is_null($blog->image_path))
                                <img src="{{ asset('storage/'. $blog->image_path) }}" class="img-fluid mx-auto d-block" alt="Product image">
                            @else
                                <img src="{{ asset('storage/Empty_picture.jpg') }}" class="img-fluid mx-auto d-block" alt="Empty-image">    
                            @endif
                            </div>
                        </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Zapisz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
