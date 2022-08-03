<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'website_id' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        if($validation->fails()){
            return response()->json(json_decode($validation->errors(), true),400);
        }
        $post = Post::create(['title'=> $request->title,'description'=> $request->description,'website_id'=> $request->website_id]);
        return response()->json(['message'=> 'Post created'],200);
        
    }

    public function subscribe(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required|string',
            'website_id' => 'required|string',
        ]);
        if($validation->fails()){
            return response()->json(json_decode($validation->errors(), true),400);
        }
        $subscribe = Subscriber::updateOrCreate(['user_id'=> $request->user_id,'website_id'=> $request->website_id]);
        return response()->json(['message'=> 'Subscribed Successfully'],200);
    }


}
