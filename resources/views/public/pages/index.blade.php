<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mis libros</title>
  </head>
  <body>
    <h1>Lista de libros</h1>

    <ul>
      @forelse($books as $book)
        <li>{{ $book['title'] }} ({{ $book['author'] }})</li>
      @empty
        <li>No hay libros</li>
      @endforelse
    </ul>
  </body>
</html>
