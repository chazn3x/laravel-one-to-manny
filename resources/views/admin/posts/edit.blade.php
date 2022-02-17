@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <span>Modifica il post: </span><span class="text-muted">{{$post->title}}</span>
                </div>
                
                <div class="card-body">
                    <form id="_update" action="{{ route( 'posts.update', $post->id ) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Titolo --}}
                        <div class="form-group">
                            <label for="title">Titolo:</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" placeholder="Inserisci il titolo" value="{{ old('title') ?? $post->title }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contenuto --}}
                        <div class="form-group">
                            <label for="content">Contenuto:</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Inserisci il contenuto" rows="6">{{ old('content') ?? $post->content }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Pubblicazione --}}
                        <div class="_status mb-3">
                            <span>Stato:</span>
                            @if ( $post->published )
                                <span class="badge badge-success">Online</span>
                            @else
                                <span class="badge badge-secondary">Bozza</span>
                            @endif

                            <input id="published" type="hidden" name="published" value="">
                        </div>

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