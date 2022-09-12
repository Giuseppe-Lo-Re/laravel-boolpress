<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        // Richiamo tutti i post
        $posts = Post::all();

        $data = [
            'success' => true,
            'results' => $posts
        ];
    
        // Ritorno un file json anzichè una view
        return response()->json($data);
    }   

}
