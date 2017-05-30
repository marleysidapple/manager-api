<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * List of posts
     * @param int $id
     * @return Post
     */
    public function index()
    {
        $post = Post::all();
        return response()->json($post, 200);
    }

    /**
     * @param integer $id
     * @return Single Post
     */
    public function findPostById($id)
    {
        $post = Post::find($id);
        return response()->json($post, 200);
    }

    /**
     *  @param  array  $data
     *  @return Post
     */

    public function store(PostRequest $request)
    {
        DB::BeginTransaction();
        try {
            $post = Post::create(array(
                'author'      => $request->author,
                'title'       => $request->title,
                'description' => $request->description,
                'posted_date' => date('Y-m-d'),
                'keyword'     => $request->keyword,
            ));
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'something went wrong'], 401);
        }
        return response()->json(['post' => $post], 200);
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->title       = $request->title;
            $post->description = trim($request->description);
            $post->author      = $request->author;
            $post->keyword     = $request->keyword;
            $post->save();
            return response()->json(['success' => 'post updated'], 200);

        }
    }

    /**
     * @param int $id
     * return message
     * delete post
     */
    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            if (is_null($post)) {
                return response()->json(['error' => 'Invalid data'], 401);
            }
            $post->delete();
        } catch (Exception $e) {
            return response()->json(['error' => 'something went wrong'], 401);
        }
        return response()->json(['success' => 'post deleted'], 200);

    }

}
