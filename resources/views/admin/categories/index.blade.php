@extends('admin.layouts.master')

@section('title', 'Categorie - Pixel Pop Admin')

@section('dashboard')
<div class="mb-4">
    <h1 class="fw-bold mb-1">Categorie</h1>
    <p class="text-muted mb-0">Tutte le categorie di Pixel Pop.</p>
</div>

<div class="card admin-card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">Azioni rapide</h5>

        <div class="d-flex flex-column flex-sm-row gap-3">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-pixel px-4 py-2">
                + Aggiungi nuova categoria
            </a>

            <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-dark px-4 py-2">
                + Aggiungi nuovo articolo
            </a>

            <a href="{{ route('admin.authors.create') }}" class="btn btn-outline-dark px-4 py-2">
                + Aggiungi nuovo autore
            </a>
        </div>
    </div>
</div>

<div class="row g-3">
    @foreach ($categories as $category)
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
            <div class="card admin-card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <small class="text-muted">#{{ $category->id }}</small>

                        <div 
                            class="rounded-circle"
                            style="width: 18px; height: 18px; background-color: {{ $category->color ?? '#ff4fa3' }};"
                        ></div>
                    </div>

                    <h5 class="fw-bold mb-1">
                        {{ $category->name }}
                    </h5>

                    <p class="text-muted small mb-0">
                        {{ $category->slug }}
                    </p>

                    <div class="d-flex flex-wrap gap-2 pt-4">
                        <button 
                            type="button" 
                            class="btn btn-outline-pixel btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#categoryModal{{ $category->id }}"
                        >
                            Vedi
                        </button>

                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-dark btn-sm">
                            Modifica
                        </a>

                        <button 
                            type="button" 
                            class="btn btn-outline-dark btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#categoryDeleteModal{{ $category->id }}"
                        >
                            Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODALE DETTAGLIO CATEGORIA --}}
        <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="categoryModalLabel{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="categoryModalLabel{{ $category->id }}">
                            Dettaglio categoria
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>

                    <div class="modal-body">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div 
                                class="rounded-circle shadow-sm"
                                style="width: 48px; height: 48px; background-color: {{ $category->color ?? '#ff4fa3' }};"
                            ></div>

                            <div>
                                <h4 class="fw-bold mb-0">
                                    {{ $category->name }}
                                </h4>

                                <small class="text-muted">
                                    {{ $category->slug }}
                                </small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="fw-semibold">Colore:</span>
                            <span class="text-muted">{{ $category->color ?? 'Nessun colore' }}</span>
                        </div>

                        <div>
                            <span 
                                class="badge rounded-pill px-3 py-2"
                                style="color: {{ $category->color ?? '#ff4fa3' }}; border: 1px solid {{ $category->color ?? '#ff4fa3' }}; background-color: #fff;"
                            >
                                Anteprima badge
                            </span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">
                            Chiudi
                        </button>

                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-pixel btn-sm">
                            Modifica
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODALE ELIMINA CATEGORIA --}}
        <div class="modal fade" id="categoryDeleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="categoryDeleteModalLabel{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="categoryDeleteModalLabel{{ $category->id }}">
                            Eliminare questa categoria?
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>

                    <div class="modal-body">
                        <p class="mb-3">
                            Stai per eliminare la categoria:
                        </p>

                        <div class="d-flex align-items-center gap-3">
                            <div 
                                class="rounded-circle shadow-sm"
                                style="width: 40px; height: 40px; background-color: {{ $category->color ?? '#ff4fa3' }};"
                            ></div>

                            <div>
                                <h5 class="fw-bold mb-0">
                                    {{ $category->name }}
                                </h5>

                                <small class="text-muted">
                                    {{ $category->slug }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Elimina" class="btn btn-outline-pixel btn-sm">
                        </form>

                        <button type="button" class="btn btn-pixel btn-sm" data-bs-dismiss="modal">
                            Annulla
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection