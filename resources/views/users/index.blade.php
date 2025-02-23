@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-6">
        <h1><i class="fa-solid fa-users"></i> Użytkownicy</h1>
    </div>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">email</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Numer telefonu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->phone_number }}</td>
            <td><button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}"><i class="fa-solid fa-trash"></i></button></td>
            </tr>

        @endforeach
    </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('users') }}/"  
@endsection
{{-- @section('js-file')
<script src="{{asset('js/delete.js')}}"></script>
@endsection --}}
