@extends('admin.layouts.master')

@section('title', 'Articoli - Pixel Pop Admin')

@section('dashboard')

    {{-- HEADER PAGINA --}}
    <div class="mb-4">
        <h1 class="fw-bold mb-1">Articoli</h1>
        <p class="text-muted mb-0">
            Tutti gli articoli di Pixel Pop.
        </p>
    </div>

    {{-- AZIONI RAPIDE --}}
    <div class="card admin-card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3">Azioni rapide</h5>

            <div class="d-flex flex-column flex-sm-row gap-3">
                <button type="button" class="btn btn-outline-dark px-4 py-2">
                    + Aggiungi articolo
                </button>

                <button type="button" class="btn btn-outline-dark px-4 py-2">
                    + Aggiungi categoria
                </button>

                <button type="button" class="btn btn-outline-dark px-4 py-2">
                    + Aggiungi autore
                </button>
            </div>
        </div>
    </div>

    {{-- LISTA ARTICOLI --}}
    <div class="card admin-card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h5 class="fw-bold mb-1">Articoli</h5>
            <p class="text-muted mb-0">
                Elenco dei contenuti inseriti nel magazine.
            </p>
        </div>

        <div class="card-body px-4">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr class="text-muted">
                            <th>Titolo</th>
                            <th>Autore</th>
                            <th>Stato</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $article->title }}
                                    </div>

                                    @if($article->subtitle)
                                        <small class="text-muted">
                                            {{ $article->subtitle }}
                                        </small>
                                    @endif
                                </td>

                                <td>
                                    @if($article->author)
                                        {{ $article->author->name }}
                                    @else
                                        <span class="text-muted">Nessun autore</span>
                                    @endif
                                </td>

                                <td>
                                    @if($article->is_published)
                                        <span class="badge rounded-pill text-green bg-rounded-pill shadow-sm">
                                            Pubblicato
                                        </span>
                                    @else
                                        <span class="badge rounded-pill text-yellow bg-rounded-pill shadow-sm">
                                            Bozza
                                        </span>
                                    @endif
                                </td>

                                <td>

                                <a href="{{ route('admin.articles.show', $article) }}" class="btn btn-outline-pixel btn-sm mb-1">
                                    Vedi
                                </a>
                                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-pixel btn-sm mb-1">
                                    Modifica
                                </a>
                                <a href="{{ route('admin.articles.destroy', $article) }}" class="btn btn-outline-dark btn-sm mb-1">
                                    Elimina
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection