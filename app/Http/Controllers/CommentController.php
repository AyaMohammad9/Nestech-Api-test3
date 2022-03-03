<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use App\Models\Post;
use App\Traits\ResponseTrait;

class CommentController extends Controller
{
    use ResponseTrait;

    public function store(Request $request, $id)
    { 
        $post = Post::findOrFail($id);  

        $validator = Validator::make($request->all(), [
            'content' => 'required|max:200|string' 
        ]);

        if ($validator->fails()) {
            return $this->Error('403', $validator->errors());
        }

        $comment = Comment::create([
            'content' => $request->content,
            'post_id' => $id,
            'auther_id' => auth()->user()->id
        ]);

        return $this->returnData('Comment', $comment, 'Add comment successfully!');
    }
}
