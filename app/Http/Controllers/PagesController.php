<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Carga de la página de inicio.<
     */
    public function index()
    {
      $books = [
        [
          'title' => 'El Quijote',
          'author'=> 'Miguel de Cervantes'
        ],
        [
          'title' => 'Moby Dick',
          'author'=> 'Herman Melville'
        ],
        [
          'title' => 'El señor de los anillos',
          'author'=> 'J.R.R. Tolkien'
        ]
      ];

      //return view('public.index', ['books' => $libros]);
      //return view('public.index', compact('books'));
      return view('public.pages.index')->withBooks($books);
    }

    public function contact()
    {
      return view('public.pages.contact');
    }

    public function about()
    {
      return view('public.pages.about');
    }
}
