@extends('admin.layouts.master')

@section('title', 'Autore - Pixel Pop Admin')

@section('dashboard')


<div class="container">
    <div class="row justify-content-center">
             <div class="d-flex justify-content-center gap-3 mb-4">
                {{-- link --}}
            <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna agli autori
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna alla Dashboard
            </a>
            </div>
            {{-- fine link --}}

        <div class="col-12 col-lg-9 col-xl-8">
            {{-- card autore --}}
        <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 d-flex flex-column justify-content-center align-items-center">
             
            
            @if($author->avatar_image)
            <img src="{{ asset('storage/' . $author->avatar_image) }}" alt="{{ $author->name }}" class="overflow-hidden d-inline-block rounded-circle  overflow-hidden d-inline-block"  style="width: 200px;">
            @endif
            <h1 class="fw-bold mb-1">{{ $author->name }}</h1>
            <h4 class="text-muted">{{ $author->email }}</h4>
            <p class="mt-3">{{ $author->bio }}</p>

            {{-- pulsanti --}}
            <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-outline-pixel btn-sm mt-3">Modifica</a>
            <button type="button" class="btn btn-outline-dark mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAuthorModal">Elimina</button>

        </div>
            </div>
            {{-- fine card autore --}}
       
        </div>
    </div>
</div>

{{-- modale --}}
{{-- <div class="modal fade" id="deleteAuthorModal" tabindex="-1" aria-labelledby="deleteAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="deleteAuthorModalLabel">
                    Sei sicuro di voler eliminare l'autore?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    Stai eliminando l'autore:
                    <strong>{{ $author->name }}</strong>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">
                    Annulla
                </button>

                <form action="{{ route('admin.authors.destroy', $author) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Elimina" class="btn btn-outline-pixel btn-sm">
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection