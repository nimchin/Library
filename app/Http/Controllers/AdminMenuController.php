<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;

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
            $users = User::where('name', 'like', $searchedText)->orWhere('email', 'like', $searchedText)->get();
        } else {
            $users = User::all();
        }
        return view('admin_menu.user_search')->with([
            'users'      => $users->where('role_id', '=', Role::USER_ROLE_ID),
        ]);
    }

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
}
