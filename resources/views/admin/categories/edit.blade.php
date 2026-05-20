@extends('admin.layouts.master')

@section('title', 'Modifica categoria - Pixel Pop Admin')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna alle categorie</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm mt-3">
                Torna alla Dashboard</a>
        </div>

                {{-- se non viene compilato bene il form --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="col-12 col-xl-10">
            <div class="row g-4">           
                {{-- CATEGORIE ESISTENTI --}}
                <div class="col-12 col-lg-5">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 h-100">
                        <h5 class="fw-bold mb-1">Categorie già presenti</h5>
                        <p class="text-muted mb-4">Elenco rapido delle sezioni già create.</p>
        
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($categories as $category)
                                <span  class="category-mini-badge rounded-pill px-3 py-2 fw-semibold"style="color: {{ $category->color }}; border-color: {{ $category->color }};">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                        @if($categories->isEmpty())
                            <p class="text-muted mb-0">Non ci sono ancora categorie.</p>
                        @endif
                    </div>
                </div>


                {{-- FORM CREATE --}}
                <div class="col-12 col-lg-7">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 h-100">
                        <h1 class="fw-bold mb-1">Modifica categoria</h1>
                        <p class="text-muted mb-4">
                           Modifica una categoria editoriale già esistente per Pixel Pop.
                        </p>
                        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nome categoria</label>
                                <input type="text" id="name" name="name" class="form-control input-pixel" value="{{ $category->name }}">
                            </div>

                            <div class="mb-4">
                                <label for="color" class="form-label fw-semibold">Colore</label>
                                <input type="color" id="color" name="color" class="form-control form-control-color input-pixel" value="{{ $category->color }}">
                            </div>

                            <div class="d-flex flex-column flex-sm-row gap-3">
                                <button type="submit" class="btn btn-pixel px-4 py-2">
                                    Salva modifiche
                                </button>

                                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark px-4 py-2">Annulla
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection