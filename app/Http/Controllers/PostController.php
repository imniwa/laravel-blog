<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Request $request){
        switch ($request->method()) {
            case 'GET':
                $user = Auth::user();
                $post = Post::where('users_id', $user->id)->get();
                return view('page.post', [
                    'data' => $post
                ]);
            case 'POST':
                dd($request->all());
                break;
            default:
                abort(404);
        }
    }
}
