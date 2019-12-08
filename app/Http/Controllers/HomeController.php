<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Book;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = DB::table('books')->paginate(3);
        return view('home', [
            'books' => $books,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart(Request $request) {
        $orders = $request->user()->orders()->get();
        $sameOrder = $orders->first();
        foreach($orders as $order) {
            if($order->book_id == $sameOrder->book_id) {
                $sameOrders[] = $order;
                $sameOrder = $order;
            }
            else {
                $uniqueOrders[] = $order;
            }
        }
        $allOrders['sameOrders'] = $sameOrders ?? null;
        $allOrders['uniqueOrders'] = $uniqueOrders ?? null;

        return view('cart.index')->with([
            'orders'    => $allOrders ?? null,
        ]);
    }
    public function deleteOrder(Request $request)
    {
        if($request->book_id) {
            Order::where('book_id', (int)$request->book_id)->delete();
        }
        return redirect()->route('cart');
    }

    public function setLocaleUA()
    {
        app()->setLocale('ua');
        return redirect()->back();
    }
    public function setLocaleEng()
    {
        app()->setLocale('en');
        return redirect()->back();
    }
}
