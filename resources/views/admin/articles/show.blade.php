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
            <span class="small text-muted mb-3">Pubblicato il: {{ $article->published_at}}</span>
            <p>{{ $article->content }}</p>
<div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-pixel btn-sm mt-3">
                Modifica
            </a>
            <button type="button" class="btn btn-outline-dark mt-3 btn-sm" data-toggle="modal" data-bs-target="#deleteArticleModal">
                Elimina
                </button>

        </div>
            </div>
            {{-- fine card articolo --}}
       
        </div>
    </div>
</div>

{{-- modale --}}
<div class="modal fade" id="deleteArticleModal" tabindex="-1" aria-labelledby="deleteArticleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="deleteArticleModalLabel">
                    Sei sicuro di voler eliminare l'articolo?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    Stai eliminando l'articolo:
                    <strong>{{ $article->title }}</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">
                    Annulla
                </button>

                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Elimina" class="btn btn-outline-pixel btn-sm">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection