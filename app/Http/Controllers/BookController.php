<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\ActionsWithBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        return view('book.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ActionsWithBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionsWithBookRequest $request)
    {
        $data = $request->validated();
        $book = new Book();
        $book->fill($data);
        $book->save();
        return redirect()->route('books.index')->withSuccess('Книга успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ActionsWithBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(ActionsWithBookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->fill($data);
        $book->save();
        return redirect()->route('books.index')->withSuccess('Книга успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book) {
            $authors = $book->authors;
            $book->authors()->detach($authors);
            $book->delete();
        }
        return redirect()->route('books.index')->withSuccess('Книга успешно удалена!');
    }
}
