@extends('public.layout')

@section('title', 'About IBDB')

@section('content')
<h1>Lista de libros</h1>
<ul>
  @forelse($books as $book)
    <li>{{ $book['title'] }} ({{ $book['author'] }})</li>
  @empty
    <li>No hay libros</li>
  @endforelse
</ul>
@endsection
