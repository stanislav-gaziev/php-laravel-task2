<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\ActionsWithBookRequest;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $data = [];

        foreach ($books as $book) {
            $authors = $book->authors->implode('full_name', ', ');
            $data[] = ['id' => $book->id, 'name' => $book->name, 'price' => $book->price, 'authors' => $authors];
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Книга не найдена!'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $book->only(['name', 'price'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ActionsWithBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ActionsWithBookRequest $request)
    {
        $book = Book::find($request->input('id'));

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Книга не найдена!'
            ], 400);
        }

        $data = $request->validated();
        $updated = $book->fill($data)->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Книга не может быть обновлена!'
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Книга не найдена!'
            ], 400);
        }

        $authors = $book->authors;
        $book->authors()->detach($authors);

        if ($book->delete()) {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Книга не может быть удалена!'
        ], 500);
    }
}
