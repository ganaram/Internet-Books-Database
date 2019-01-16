@extends('public.layout')

@section('title', 'About IBDB')

@section('content')
<h1>Lista de libros</h1>
    @forelse($books as $book)
    <div class="card mr-4" style="width: 28rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $book->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $book->author}}</h6>
        <p class="card-text">{{ $book->description }}</p>
        <a href="/books/{{ $book->id }}" class="btn btn-primary btn-sm">More Info</a>
        <a href="/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
        <form action="/books/{{ $book->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm">Delete Book</button>
        </form>
      </div>
    </div>
    @empty
      <p>No hay libros</p>
    @endforelse
@endsection
