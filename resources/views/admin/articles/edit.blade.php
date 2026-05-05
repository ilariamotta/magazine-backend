@extends('admin.layouts.master')

@section('title', 'Nuovo articolo - Pixel Pop Admin')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna agli articoli
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna alla Dashboard
            </a>
        </div>

        <div class="col-12 col-lg-9 col-xl-8">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                <h1 class="fw-bold mb-1">Modifica l'articolo</h1>
                <p class="text-muted mb-4">Modifica il contenuto già esistente.</p>

                <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control input-pixel" value="{{ $article->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label fw-semibold">Sottotitolo</label>
                        <input type="text" id="subtitle" name="subtitle" class="form-control input-pixel" value="{{ $article->subtitle }}">
                    </div>

                    <div class="mb-3">
                        <label for="author_id" class="form-label fw-semibold">Autore</label>
                        <select name="author_id" id="author_id" class="form-select input-pixel">
                            <option value="">Seleziona un autore</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" @selected($article->author_id == $author->id)">
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label fw-semibold">Immagine di copertina</label>
                        <input type="file" id="cover_image" name="cover_image" class="form-control input-pixel">
                    </div>

                    @if ($article->cover_image)
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Immagine attuale</label>
                            <div>
                                <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="img-fluid rounded-4">
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="content" class="form-label fw-semibold">Contenuto</label>
                        <textarea id="content" name="content" rows="8" class="form-control input-pixel">{{ $article->content }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Categorie</label>
                        <div class="row g-2">
                            @foreach ($categories as $category)
                                <div class="col-12 col-sm-6">
                                    <div class="form-check category-check rounded-3 px-3 py-2">
                                        <input type="checkbox" class="form-check-input" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" @checked($article->categories->contains($category->id))>
                                        <label class="form-check-label" for="category_{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="is_published" class="form-label fw-semibold">Da pubblicare?</label>
                        <select name="is_published" id="is_published" class="form-select input-pixel">
                            <option value="0" @selected($article->is_published == 0)>No, lascia in bozza</option>
                            <option value="1" @selected($article->is_published == 1)>Sì, pubblica</option>
                        </select>
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <button type="submit" value="Salva l'articolo" class="btn btn-pixel px-4 py-2">
                            Salva articolo
                        </button>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-dark px-4 py-2">
                            Annulla
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection