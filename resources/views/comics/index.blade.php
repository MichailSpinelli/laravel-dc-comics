@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Comics
            </h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">title</th>
                        <th scope="col">price</th>
                        <th scope="col">series</th>
                        <th scope="col">sale date</th>
                        <th scope="col">type</th>
                        <th scope="col">artist</th>
                        <th scope="col">writers</th>
                    </tr>
                </thead>

                 <tbody>
                    @foreach ($comics as $comic)
                    <tr>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td> 
                        <td>{{ $comic->series }}</td> 
                        <td>{{ $comic->sale_date }}</td> 
                        <td>{{ $comic->type }}</td>
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">
                                view
                            </a>
                            <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning">
                                edita
                            </a>
                            <form onsubmit="return confirm('Stai per cancellare');"  action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                            </form>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
