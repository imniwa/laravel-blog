<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                $user = Auth::user();
                $post = Post::where('users_id', $user->id)->get();
                return view('page.post', [
                    'data' => $post
                ]);
            case 'POST':
                $data = $request->only(['title', 'content']);
                $data['users_id'] = Auth::user()->id;
                $post = Post::create($data);
                return redirect()->route('post');
            case 'DELETE':
                $data = Post::where('id', $request->id)->first();
                if ($data) {
                    $data->delete();
                }
                return redirect()->route('post');
            default:
                abort(404);
        }
    }

    public function editPost(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                return redirect()->route('post');
            case 'POST':
                $data = Post::where('id', $request->id)->first();
                return view('page.edit-post', [
                    'data' => $data,
                ]);
            case 'PATCH':
                $data = $request->only(['title', 'content']);
                foreach ($data as $key => $value) {
                    if (!$value) {
                        unset($data[$key]);
                    }
                }
                $post = Post::where('id', $request->id)->first();
                if($post){
                    $post->update($data);
                }
                return redirect()->route('post');
            default:
                abort(404);
        }
    }
}
