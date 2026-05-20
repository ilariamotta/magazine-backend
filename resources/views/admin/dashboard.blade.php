@extends('admin.layouts.master')

@section('title', 'Dashboard - Pixel Pop Admin')

@section('dashboard')

    {{-- HEADER PAGINA --}}
    <div class="mb-4">
        <h1 class="fw-bold mb-1">Dashboard</h1>
        <p class="text-muted mb-0">
           I contenuti di Pixel Pop.
        </p>
    </div>

    

   {{-- CARD STATISTICHE --}}
<div class="row g-3 mb-4">

    <div class="col-12 col-sm-6 col-xl">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h6 class="stat-title text-pink fw-bold mb-2">Articoli totali</h6>
                <h3 class="fw-bold mb-0">{{ $articleCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h6 class="stat-title text-green fw-bold mb-2">Pubblicati</h6>
                <h3 class="fw-bold mb-0">{{ $publishedArticleCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h6 class="stat-title text-yellow fw-bold mb-2">Bozze</h6>
                <h3 class="fw-bold mb-0">{{ $draftArticleCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h6 class="stat-title text-cyan fw-bold mb-2">Autori</h6>
                <h3 class="fw-bold mb-0">{{ $authorsCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body">
                <h6 class="stat-title text-purple fw-bold mb-2">Categorie</h6>
                <h3 class="fw-bold mb-0">{{ $categoriesCount }}</h3>
            </div>
        </div>
    </div>

</div>

  {{-- AZIONI RAPIDE --}}
    <div class="card admin-card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3">Azioni rapide</h5>

            <div class="d-flex flex-column flex-sm-row gap-3">
                <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-dark px-4 py-2">+ Aggiungi nuovo articolo</a>

                <a href="{{ route('admin.categories.create')}}" class='btn btn-outline-dark px-4 py-2'>+ Aggiungi categoria</a>

                 <a href="{{ route('admin.authors.create') }}" class="btn btn-outline-dark px-4 py-2">+ Aggiungi nuovo autore</a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.dashboard') }}" method="GET" class="mt-4 mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control input-pixel" placeholder="Cerca per titolo, sottotitolo o autore..."value="{{ $search ?? '' }}">
        <button class="btn btn-outline-pixel" type="submit">Cerca</button>
         <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">Reset</a>
    </div>
</form>

    {{-- ARTICOLI RECENTI --}}
    <div class="card admin-card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h5 class="fw-bold mb-1">Articoli recenti</h5>
            <p class="text-muted mb-0">
                Ultimi contenuti inseriti nel magazine.
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
                        @foreach($latestArticles as $article)
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
            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  

@endsection