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
                <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-pixel px-4 py-2">+ Aggiungi nuovo
                    articolo</a>

                <a href="{{ route('admin.categories.create') }}" class='btn btn-outline-dark px-4 py-2'>+ Aggiungi
                    categoria</a>

                <a href="{{ route('admin.authors.create') }}" class="btn btn-outline-dark px-4 py-2">+ Aggiungi nuovo
                    autore</a>
            </div>
        </div>
    </div>

    {{-- SEARCH BAR --}}
    <form action="{{ route('admin.articles.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control input-pixel"
                placeholder="Cerca per titolo, sottotitolo o autore..." value="{{ $search ?? '' }}">
            <button class="btn btn-outline-pixel" type="submit">Cerca</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-dark">Reset</a>
        </div>
    </form>

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
                        @foreach ($articles as $article)
                            <tr>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $article->title }}
                                    </div>

                                    @if ($article->subtitle)
                                        <small class="text-muted">
                                            {{ $article->subtitle }}
                                        </small>
                                    @endif
                                </td>

                                <td>
                                    @if ($article->author)
                                        {{ $article->author->name }}
                                    @else
                                        <span class="text-muted">Nessun autore</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($article->is_published)
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

                                    <a href="{{ route('admin.articles.show', $article) }}"
                                        class="btn btn-outline-pixel btn-sm mb-1">Vedi</a>
                                    <a href="{{ route('admin.articles.edit', $article) }}"
                                        class="btn btn-outline-pixel btn-sm mb-1">Modifica</a>
                                    <button type="button" class="btn btn-outline-dark mb-1 btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteArticleModal{{ $article->id }}">Elimina</button>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
   {{-- modali eliminazione articoli --}}
@foreach ($articles as $article)
    <div class="modal fade" id="deleteArticleModal{{ $article->id }}" tabindex="-1" aria-labelledby="deleteArticleModalLabel{{ $article->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteArticleModalLabel{{ $article->id }}">Sei sicuro di voler eliminare l'articolo?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">Stai eliminando l'articolo:<strong> {{ $article->title }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Annulla</button>

                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST">
                        @csrf
                        @method("DELETE")

                        <input type="submit" value="Elimina" class="btn btn-outline-pixel btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection