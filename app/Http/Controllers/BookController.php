<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Imports\BookImport;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new BookImport, $request->file);
        return "Imported successfully";
    }

    public function home()
    {
        $books = Book::all();
        return response($books, 201);
    }

    public function getBookById(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        return response($book, 201);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $books = Book::where('naziv_knjige', 'like', '%' . $keyword . '%')->get();

        return response($books, 201);
    }
}
