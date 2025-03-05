<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function get()
    {
        $data = TeamMember::get();
        return response()->json(
            [
                'status' => true,
                'code' => 200,
                'message' => 'Get Team members successfully!',
                'data' => $data
            ]
        );
    }

    public function detail($id)
    {
        $data = TeamMember::find($id);
        if (!$data) {
            return response()->json(
                [
                    'status' => false,
                    'code' => 500,
                    'message' => 'Team Member not found with that id!',
                ]
            );
        }
        return response()->json(
            [
                'status' => true,
                'code' => 200,
                'message' => 'Get Team member detail successfully!',
                'data' => $data
            ]
        );
    }
}
