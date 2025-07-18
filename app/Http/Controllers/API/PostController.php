<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::all();

        return response()->json([
            'status' => true,
            'message' => 'All Post Data.',
            'data' => $data,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateUser = Validator::make(
    $request->all(),
    [
                'title' => 'required',
                'description'=> 'requiredl',
                'image'=> 'required|mimes:png,jpg,jpeg,gif',
            ]
        );

        if($validateUser->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'Validation Error',
                'errors' => $validateUser->errors()->all()
            ],401);
        }

        $post = Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $imageName,
        ]);

        return response()->json([
            'status'=> true,
            'message' => '',
            'post' => $post,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
