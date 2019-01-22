<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'title'         => 'required|min:3',
            'author'        => 'required',
            'description'    => 'required'
        ],[
            'title.required'=> 'El título es requerido.',
            'title.min' => 'El título debe tener al menos 3 caracteres',
            'author.required'=> 'El autor es requerido.',
            'description.required'=> 'La descripción es requerida.',
        ]);

        Book::create([
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'author' => request('author'),
            'description' => request('description')
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();

        return view('public.books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('public.books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Book $book)
    {
        request()->validate([
            'title'         => 'required|min:3',
            'author'        => 'required',
            'description'    => 'required'
        ],[
            'title.required'=> 'El título es requerido.',
            'title.min' => 'El título debe tener al menos 3 caracteres',
            'author.required'=> 'El autor es requerido.',
            'description.required'=> 'La descripción es requerida.',
        ]);

        Book::update([
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'author' => request('author'),
            'description' => request('description')
        ]);

        return redirect('/books/'.$book->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/');
    }
}
