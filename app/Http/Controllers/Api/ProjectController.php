<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function get()
    {
        $data = Project::get();
        return response()->json(
            [
                'status' => true,
                'code' => 200,
                'message' => 'Get project successfully!',
                'data' => $data
            ]
        );
    }

    public function detail($id)
    {
        $data = Project::find($id);
        if (!$data) {
            return response()->json(
                [
                    'status' => false,
                    'code' => 404,
                    'message' => 'Project not found with that id!',
                ]
            );
        }
        return response()->json(
            [
                'status' => true,
                'code' => 200,
                'message' => 'Get project detail successfully!',
                'data' => $data
            ]
        );
    }
}
