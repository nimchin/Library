<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class AdminMenuController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        return view('admin_menu.index');
    }

    public function addUser() {
        return 1;
    }

    public function searchUser() {
        return 1;
    }
}
