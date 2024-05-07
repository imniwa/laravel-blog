<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account(Request $request){
        switch ($request->method()) {
            case 'GET':
                $all_users = User::all();
                return view('page.account', [
                    'data' => $all_users
                ]);
            case 'POST':
                dd($request->all());
            default:
                abort(404);
        }
    }
}
