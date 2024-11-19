<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $data = [
            'reviews' => Review::paginate(10),
        ];

        return view('admin.comment.list', $data);
    }
}
