<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\ActionsWithAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate();
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = new Author();
        return view('author.create', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ActionsWithAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionsWithAuthorRequest $request)
    {
        $data = $request->validated();
        $author = new Author();
        $author->fill($data);
        $author->save();
        return redirect()->route('authors.index')->withSuccess('Автор успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ActionsWithAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(ActionsWithAuthorRequest $request, Author $author)
    {
        $data = $request->validated();
        $author->fill($data);
        $author->save();
        return redirect()->route('authors.index')->withSuccess('Автор успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if ($author) {
            $books = $author->books;
            $author->books()->detach($books);
            $author->delete();
        }
        return redirect()->route('authors.index')->withSuccess('Автор успешно удален!');
    }
}
