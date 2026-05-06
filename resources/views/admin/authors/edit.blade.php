@extends('admin.layouts.master')

@section('title', 'Modifica autore - Pixel Pop Admin')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna agli autori
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna alla Dashboard
            </a>
        </div>

        <div class="col-12 col-lg-9 col-xl-8">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                <h1 class="fw-bold mb-1">Modifica autore</h1>
                <p class="text-muted mb-4">Modifica le informazioni dell'autore.</p>

                <form action="{{ route('admin.authors.update', $author) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nome</label>
                        <input type="text" id="name" name="name" class="form-control input-pixel" value="{{ $author->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control input-pixel" value="{{ $author->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label fw-semibold">Biografia</label>
                        <textarea id="bio" name="bio" rows="4" class="form-control input-pixel">{{ $author->bio }}</textarea>
                    </div>
                     <div class="mb-3">
                        <label for="avatar_image" class="form-label fw-semibold">Immagine di profilo</label>
                        <input type="file" id="avatar_image" name="avatar_image" class="form-control input-pixel">
                    </div>
                     @if ($author->avatar_image)
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Immagine profilo attuale</label>
                            <div>
                                <img src="{{ asset('storage/' . $author->avatar_image) }}" alt="{{ $author->avatar_image }}" class="img-fluid rounded-4" style="width: 200px; height: 200px; object-fit: cover;">
                            </div>
                        </div>
                    @endif

                    {{-- bottoni --}}
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <button type="submit" value="Salva l'articolo" class="btn btn-pixel px-4 py-2">
                            Salva modifiche
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