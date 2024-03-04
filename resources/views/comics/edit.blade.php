@extends('layouts.app')

@section('page-title',  $comic->title.' Edit')

@section('main-content')
<h1 class="text-center">
   {{ $comic->title }} Modifica
</h1>

<div class="container ">
   <div class="row">
      <div class="col py-4">

          <div class="card">

              <a href="{{ route('comics.index') }}" class="btn btn-primary">
                  Torna alla pagina principaòe
              </a>
          </div>

          <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">

                @csrf

            @method('PUT')

            <div class="card">
               <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
               <input value="{{ $comic->title }}" type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="64" required>
               @error('title')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="description" class="form-label">description</label>
               <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione...">{{ $comic->description }}</textarea>
               @error('description')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="thumb" class="form-label">thumb <span class="text-danger">*</span></label>
               <input value="{{ $comic->thumb }}" type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine..." >
               @error('thumb')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="price" class="form-label">price</label>
               <input value="{{ $comic->price }}" type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo..." min="0.5" max="200">
               @error('price')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="series" class="form-label">series </label>
               <input value="{{ $comic->series }}" type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie..." maxlength="64" required>
               @error('series')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="sale_date" class="form-label">sale date </label>
               <input value="{{ $comic->sale_date }}" type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data" >
               @error('sale_date')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="type" class="form-label">type</label>
               <input value="{{ $comic->type }}" type="text" class="form-control" id="type" name="type" placeholder="Inserisci il tipo" maxlength="64">
               @error('type')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="artists" class="form-label">artists</label>
               <textarea class="form-control" id="artists" name="artists" rows="3" placeholder="Inserisci gli artisti">{{ $comic->artists }}</textarea>
               @error('artists')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div class="card">
               <label for="writers" class="form-label">writers</label>
               <textarea class="form-control" id="writers" name="writers" rows="3" placeholder="Inserisci gli artisti">{{ $comic->writers }}</textarea>
               @error('writers')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>
            <div>
               <button type="submit" class="btn btn-success w-100">
                     Edita
               </button>
            </div>
          </form>
      </div>
   </div>
</div>
@endsection