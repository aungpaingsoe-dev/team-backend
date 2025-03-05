<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function get()
    {
        $data = Article::get();
        return response()->json(
            [
                'status' => true,
                'code' => 200,
                'message' => 'Get article successfully!',
                'data' => $data
            ]
        );
    }

    public function detail($id)
    {
        $data = Article::find($id);
        if (!$data) {
            return response()->json(
                [
                    'status' => false,
                    'code' => 404,
                    'message' => 'Article not found with that id!',
                ]
            );
        }
        return response()->json(
            [
                'status' => true,
                'code' => 200,
                'message' => 'Get article detail successfully!',
                'data' => $data
            ]
        );
    }
}
