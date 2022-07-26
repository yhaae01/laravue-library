<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $publishers = Publisher::all();
        $authors    = Author::all();
        $catalogs   = Catalog::all();

        return view('admin.book',compact('publishers', 'authors', 'catalogs'));
    }

    public function api()
    {
        $books =  Book::with('author', 'publisher', 'catalog')->latest()->get();
        return json_encode($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'isbn'         => 'required|string',
            'title'        => 'required',
            'year'         => 'required|numeric',
            'publisher_id' => 'required|numeric',
            'author_id'    => 'required|numeric',
            'catalog_id'   => 'required|numeric',
            'qty'          => 'required|numeric',
            'price'        => 'required|numeric',
        ]);

        $book = Book::create($request->all());
        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'isbn'         => 'required|string',
            'title'        => 'required',
            'year'         => 'required|numeric',
            'publisher_id' => 'required|numeric',
            'author_id'    => 'required|numeric',
            'catalog_id'   => 'required|numeric',
            'qty'          => 'required|numeric',
            'price'        => 'required|numeric',
        ]);

        $book->update($request->all());
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
    }
}
