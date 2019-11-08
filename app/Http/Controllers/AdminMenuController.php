<?php

namespace App\Http\Controllers;

use App\Book;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminMenuController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        return view('admin_menu.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser() {
        return view('admin_menu.add_user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchUser(Request $request) {
        if($request->searched_text) {
            $searchedText = trim(strip_tags($request->searched_text));
            $users = User::where('name', 'like', $searchedText)->orWhere('email', 'like', $searchedText);
        } else {
            $users = DB::table('users');
        }
        return view('admin_menu.user_search')->with([
            'users'      => $users->where('role_id', '=', Role::USER_ROLE_ID)->paginate(3),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email'     => 'required|unique:users',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'role_id'   => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = (int)$request->role_id;
        $user->save();
        return redirect()->back()->with('success', true)->with('message', Lang::get('admin_menu.user_created'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createBook() {
        return view('admin_menu.add_book');
    }

    public function storeBook(Request $request) {
        $request->validate([
            'name' => 'required|unique:books|max:255',
            'author'     => 'required',
            'topic' => 'required',
            'book_img' => 'required|mimes:jpeg,jpg,png,bmp,tiff |max:4096',
            'year'   => 'required',
            'count_of_books' => 'required',
        ]);
        $file = $request->file('book_img');
        $file->move(public_path() . '/img/books', $file->getClientOriginalName());
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->topic = $request->topic;
        $book->img = 'img/books/' . $file->getClientOriginalName();
        $book->year = $request->year;
        $book->count_of_books = $request->count_of_books;
        $book->save();
        return redirect()->back()->with('success', true)->with('message', Lang::get('admin_menu.book_created'));
    }
}
