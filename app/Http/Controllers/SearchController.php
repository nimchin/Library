<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use App\Book;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        dd($request->user());
        $searchedText = $request->searched_text;
        if($searchedText)
        {
            $searchedBooks = Book::where('name', 'like', "$searchedText")
                ->orWhere('author', 'like', "$searchedText")
                ->orWhere('topic', 'like', "$searchedText")
                ->orWhere('year', 'like', "$searchedText")
                ->get();
        }
        return view('home', [
            'books'     => $searchedBooks ?? null,
        ]);

    }
}
