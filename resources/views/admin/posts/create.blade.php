@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <span>Crea un nuovo post</span>
                </div>
                
                <div class="card-body">
                    <form id="_update" action="{{ route( 'posts.store' ) }}" method="POST">
                        @csrf

                        {{-- Titolo --}}
                        <div class="form-group">
                            <label for="title">Titolo:</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" placeholder="Inserisci il titolo" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contenuto --}}
                        <div class="form-group">
                            <label for="content">Contenuto:</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Inserisci il contenuto" rows="6">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Categorie --}}
                        @php
                            $sortedCategories = $categories->all();

                            usort($sortedCategories, 'sortByName');

                            function sortByName($a, $b) {
                                return $a->name > $b->name;
                            }
                        @endphp
                        <div class="form-group">
                            <label for="category">Categoria:</label>
                            <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Seleziona una categoria</option>
                                @foreach ($sortedCategories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <input id="published" type="hidden" name="published" value="">
                        
                        {{-- Buttons --}}
                        <div class="_buttons text-right">
                            {{-- Salva come bozza --}}
                            <button id="save" type="submit" class="btn btn-primary">Salva per dopo</button>
                            {{-- Salva e pubblica --}}
                            <button id="publish" type="submit" class="btn btn-success">Pubblica</button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{route('posts.index')}}" class="btn btn-primary">Torna ai post</a>
        </div>
    </div>
</div>
@endsection