<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account(Request $request){
        switch ($request->method()) {
            case 'GET':
                if(Auth::user()->role !== 'admin'){
                    return redirect()->route('post');
                }
                $all_users = User::all();
                return view('page.account', [
                    'data' => $all_users
                ]);
            case 'POST':
                $data = $request->only(['name', 'username', 'password', 'role']);
                $data['email'] = $request->name.'@example.com';
                $data['password'] = Hash::make($request->password);
                try {
                    DB::beginTransaction();
                    User::create($data);
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
                return redirect()->route('account');
            case 'DELETE':
                $user = User::where('id', $request->id)->first();
                if($user){
                    $user->delete();
                }
                return redirect()->route('account');
            default:
                abort(404);
        }
    }
}
