<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use App\Models\Post_Images;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use ResponseTrait;

    //loginUserId for check if who update or delete post is the auther or not
    protected $loginUserId;

    public function __construct()
    {
        try {
            $this->loginUserId = auth()->user()->id;
        } catch (Exception $ex) {
            return $this->Error($ex->getCode(), $ex->getMessage());
        }
    }

    public function index()
    {
        //Fetch All Post And Exclude Login Uesr Posts

        $posts = Post::with('auther', 'category', 'comments','images')
            ->whereNotIn('auther_id', [auth()->user()->id])
            ->whereNull('deleted_at')
            ->paginate(10);
        return $this->returnData('posts', PostResource::collection($posts));
    }

    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'en_content' => 'required|max:5000|string',
            'ar_content' => 'required|max:5000|string',
            'category_id' => 'required|exists:categories,id',
            'images_url' => 'array'
        ]);

        if ($validator->fails())
            return $this->Error('403', $validator->errors());

        $post = Post::create([
            'en_content' => $request->en_content,
            'ar_content' => $request->ar_content,
            'category_id' => $request->category_id,
            'auther_id' => auth()->user()->id
        ]);

        foreach ($request->images_url as $url) {
            Post_Images::create([
                'url'=>$url,
                'post_id'=>$post->id
            ]);
        }

        return $this->returnData('post', $post, 'Post was created successfully!');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'en_content' => 'required|max:5000|string',
            'ar_content' => 'required|max:5000|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return $this->Error('403', $validator->errors());
        }

        $updated = Post::whereId($id)
            ->whereAuther_id($this->loginUserId)
            ->update([
                'en_content' => $request->en_content,
                'ar_content' => $request->ar_content,
                'category_id' => $request->category_id
            ]);

        return $updated == 0 ?
            $this->Error('409', 'Faild update post') :
            $this->Success('Post was updated successfully!');
    }

    public function delete($id)
    {
        $deleted = Post::whereId($id)
            ->whereAuther_id($this->loginUserId)
            ->delete();

        return $deleted == 0 ?
            $this->Error('409', 'Faild delete post') :
            $this->Success('Post was deleted successfully!');
    }
}
