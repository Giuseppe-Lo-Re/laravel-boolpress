<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        
        // Richiamo tutti i post
        $posts = Post::paginate(6);

        $data = [
            'success' => true,
            'results' => $posts
        ];
    
        // Ritorno un file json anzichè una view
        return response()->json($data);
    }   

    public function show($slug) {
        
        // Cerco nel database il post con relativo slug con join per tags e category 
        $post = Post::where('slug', '=', $slug )->with(['tags', 'category'])->first();

        // Se il post ha un'immagine
        if ($post->cover) {
            // Creo l'url assoluto
            $post->cover = asset('storage/' . $post->cover);
        }

        if($post) {
            $data = [
                'success' => true,
                'results' => $post
            ];
        } else {
            $data = [
                'success' => false
            ];
        }
    
        return response()->json($data);
    }
}
