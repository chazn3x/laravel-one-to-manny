@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="row">

                        {{-- Date --}}
                        <div class="col-5">
                            <div class="_date">
                                <span class="text-muted">{{$post->created_at}}</span>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-2">
                            <div class="_status">
                                @if ( $post->published )
                                    <span class="badge badge-success">Online</span>
                                @else
                                    <span class="badge badge-secondary">Bozza</span>
                                @endif
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="col-5 text-right">
                            <div class="_actions">
                                {{-- Edit --}}
                                <a href="{{ route( 'posts.edit', $post->id ) }}" title="Modifica post" class="mx-2 text-decoration-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('posts.destroy', $post->id ) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" title="Cancella post" class="text-decoration-none border-0 bg-transparent text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p class="text-muted">
                        Categoria: {{ $post->category->name ?? 'Nessuna' }}
                    </p>
                    <p class="card-text">
                        {{ $post->content }}
                    </p>
                    <p class="text-muted">
                        Slug: /{{ $post->slug }}
                    </p>
                    {{-- Publish --}}
                    <div class="_publish-btn text-right">
                        @if ( !$post->published )
                            <form action="{{ route('posts.update', $post->id ) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
    
                                <input type="hidden" name="published" value="true">
                                <button type="submit" title="Pubblica post" class="btn btn-success">Pubblica post</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{route('posts.index')}}" title="Torna ai post" class="btn btn-primary">Torna ai post</a>
        </div>
    </div>
</div>
@endsection