@extends('admin.layouts.master')

@section('title', 'Articoli - Pixel Pop Admin')

@section('dashboard')


<div class="container">
    <div class="row justify-content-center">
             <div class="d-flex justify-content-center gap-3 mb-4">
                {{-- link --}}
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna agli articoli
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna alla Dashboard
            </a>
            </div>
            {{-- fine link --}}

        <div class="col-12 col-lg-9 col-xl-8">
            {{-- card articolo --}}
        <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 d-flex flex-column">
            <div class="badge rounded-pill align-self-start mb-3 {{ $article->is_published ? 'text-green' : 'text-yellow' }} bg-rounded-pill shadow-sm inline-block">{{ $article->is_published ? 'Pubblicato' : 'Bozza' }}</div>
            <h1 class="fw-bold mb-1">{{ $article->title }}</h1>
            <span class="mb-3">{{ $article->subtitle }}</span>
            <span class="small text-muted mb-1">Scritto da: {{ $article->author->name }}</span>
            <span class="small text-muted mb-3">Creato il: {{ $article->published_at}}</span>
            <p>{{ $article->content }}</p>
<div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-pixel btn-sm mt-3">
                Modifica
            </a>
            <a href="{{ route('admin.articles.destroy', $article) }}" class="btn btn-pixel btn-sm mt-3">
                Elimina
            </a>
        </div>
            </div>
            {{-- fine card articolo --}}
       
        </div>
    </div>
</div>
@endsection