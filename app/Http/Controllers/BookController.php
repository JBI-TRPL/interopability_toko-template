<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{

    // use HasFactory;
    // protected $fillable = ['title', 'author', 'year', 'price'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Book::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Book::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Book::destroy($id);
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
