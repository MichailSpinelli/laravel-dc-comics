@extends('layouts.app')

@section('page-title', 'Inserisci fumett0')

@section('main-content')
<div class="container">
    <h1>
        inserisci il fumetto
    </h1>
    
    <div class="row">
        <div class="col py-4">
            <form action="{{ route('comics.store') }}" method="POST">

                @csrf
    
                <div class="card">
                    <label for="title" class="form-label">title</label>
                </div>
    
                <div class="card">
                    <label for="description" class="form-label">description</label>
                </div>
    
                <div class="card">
                    <label for="thumb" class="form-label">link</label>
                </div>
    
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                </div>
    
                <div class="mb-3">
                    <label for="series" class="form-label">series</label>
                </div>
    
                <div class="mb-3">
                    <label for="sale_date" class="form-label">sale date</label>
                </div>
    
                <div class="mb-3">
                    <label for="type" class="form-label">type</label>
                </div>
    
                <div class="mb-3">
                    <label for="artists" class="form-label">artists</label>
                </div>
    
                <div class="mb-3">
                    <label for="writers" class="form-label">writers</span></label>
                </div>
            </form>
            <div>
                <a href="{{ route('comics.index') }}" class="btn">
                    Pagina principale fumetti
                </a>
            </div>
        </div>
    </div>
</div>
@endsection