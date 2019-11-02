<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $book = Book::where('id', (int)$request->id)->first();
        return view('books.index', [
            'book'  => $book,
        ]);
    }

    public function orderBook(Request $request)
    {
        if($request->id) {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->book_id = $request->id;
            $order->save();
            return redirect()->route('home')->with('success', true)->with('message', Lang::get('books.thanks_for_order'));
        }
        return view('errors.404');
    }
}
