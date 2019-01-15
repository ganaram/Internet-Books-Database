@extends('public.layout')

@section('title', 'About IBDB')

@section('content')
<h1>Lista de libros</h1>
  <div class="row">
    @forelse($books as $book)
    <div class="card mr-4" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $book->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $book->author}}</h6>
        <p class="card-text">{{ $book->description }}</p>
      </div>
    </div>
    @empty
      <p>No hay libros</p>
    @endforelse
  </div>
@endsection
