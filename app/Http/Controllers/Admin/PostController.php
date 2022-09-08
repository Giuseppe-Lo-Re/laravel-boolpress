<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use illuminate\Support\Str;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();

        // raccolgo tutte le richieste 
        $request_info = $request->all();

        // la variabile $show_deleted_message sarà uguale a 'deleted' se presente, altrimenti sarà uguale a 'null'
        $show_deleted_message = isset($request_info['deleted']) ? $request_info['deleted'] : null;
        
        // Salvo le variabili in un array che passerò alla view
        $data = [
            'posts' => $posts,
            'show_deleted_message' => $show_deleted_message
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Raccolgo tutte le categorie
        $categories = Category::all();

        // Raccolgo tutti i tags
        $tags = Tag::all();

        $data = [
            'categories' => $categories,
            'tags' => $tags
        ];

        return view('admin.posts.create', $data);
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate($this->getValidationRules());

        $form_data = $request->all();
        
        $new_post = new Post();
        $new_post->fill($form_data);

        $new_post->slug = $this->getFreeSlugFromTitle($new_post->title);

        $new_post->save();

        // linko i tags al nuovo post
        if(isset($form_data['tags'])) {
            $new_post->tags()->sync($form_data['tags']);
        }

        return redirect()->route('admin.posts.show', ['post' => $new_post->id,'created' => 'yes']);
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // raccolgo tutte le richieste 
        $request_info = $request->all();

        // la variabile $show_created_message sarà uguale a 'created' se presente, altrimenti sarà uguale a 'null'
        $show_created_message = isset($request_info['created']) ? $request_info['created'] : null;
        
        // Prendo la data odierna
        $now = Carbon::now();

        // Calcolo la differenza
        $created_days_ago = $post->created_at->diffInDays($now);

        // Salvo le variabili in un array che passerò alla view
        $data = [
            'post' => $post,
            'show_created_message' => $show_created_message,
            'created_days_ago' => $created_days_ago
        ];

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Raccolgo tutte le categorie
        $categories = Category::all();

    
        $post = Post::findOrFail($id);

        // Salvo le variabili in un array che passerò alla view
        $data = [
            'post' => $post,
            'categories' => $categories
        ];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validazione dei dati
        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        // Genero un nuovo slug dal titolo solo se quest'ultimo è diverso dall'originale   
        $post_to_update = Post::findOrFail($id);

        if($form_data['title'] !== $post_to_update->title) {
            $form_data['slug'] = $this->getFreeSlugFromTitle($form_data['title']);
        } else {
            $form_data['slug'] = $post_to_update->slug;
        }
        // Aggiorno il post sul database con quello modificato dell'admin
        $post_to_update->update($form_data);

        // Reindirizzo l'admin alla pagina show
        return redirect()->route('admin.posts.show', ['post' => $post_to_update->id]);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Raccolgo tutti i post da eliminare attraverso l'id
        $post_to_delete = Post::findOrFail($id);

        // Elimino il post da eliminare
        $post_to_delete->delete();

        // Reindirizzo l'admin alla pagina index
        return redirect()->route('admin.posts.index', ['deleted' => 'yes']);
    }

    // Genera uno slug unico dal titolo
    protected function getFreeSlugFromTitle($title) {
         // Assegno lo slug ad una variabile
         $slug_to_save = Str::slug($title, '-');
         // Salvo uno slug base uguale a quello da salvare
         $slug_base = $slug_to_save;
         // Verifico se questo slug è presente nel database
         $existing_slug_post = Post::where('slug', '=', $slug_to_save)->first();
         // Finchè non trovo uno slug libero, appendo un numero allo slug base
         $counter = 1;

         while($existing_slug_post) {
            // Creo un nuovo slug con $counter
            $slug_to_save = $slug_base . '-' . $counter;
            // Verifico se questo slug è presente nel database
            $existing_slug_post = Post::where('slug', '=', $slug_to_save)->first();
            // incremento il counter
            $counter++;
        }
        return $slug_to_save;
    }

    // Definisce le validazione per i campi del form
    protected function getValidationRules() {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
            'category_id' => 'nullable|exist:categories,id'
        ];
    }
}