@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3 d-flex flex-column align-items-end">
                <form action="{{ route( 'categories.store' ) }}" method="POST" class="form-inline">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nuova categoria" id="new-category" name="name">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary">Aggiungi</button>
                        </div>
                    </div>
                </form>
                @error('name')
                    <div class="alert alert-danger d-block">{{ $message }}</div>
                @enderror
            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>-</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection