@extends('layouts.dashboard')

@section('content')
    <h1>Modifica il post</h1>
    
    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')

        {{-- Category --}}
        <div class="mb-3">
            <label for="category_id">Categoria:</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">nessuna</option>

                {{-- Stampo id e name di categories nelle value --}}
                @foreach ($categories as $category)     
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tags --}}
        <div class="mb-3">
            <label for="tags">Tags:</label>

            {{-- Stampo una checkbox per ogni tag --}}
            @foreach ($tags as $tag)  
            @if ($errors->any()) 
                {{-- Se ci sono errori di validazione valuto la old() per capire dove mettere il checked --}}
                <div class="form-check">
                    <input class="form-check-input" 
                    type="checkbox" 
                    value="{{ $tag->id }}" 
                    id="tag-{{ $tag->id }}" 
                    name="tags[]"
                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                    >
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
            
            @else
                {{-- altrimenti sto caricando la pagina per la prima volta e valuto la collection dei tags --}}
                <div class="form-check">
                    <input class="form-check-input" 
                    type="checkbox" 
                    value="{{ $tag->id }}" 
                    id="tag-{{ $tag->id }}" 
                    name="tags[]"
                    {{ $post->tags->contains($tag) ? 'checked' : ''}}
                    >
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
            
            
            @endif
            @endforeach 
        </div>
        
        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>

        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="10" name="content">{{ old('content', $post->content) }}</textarea>
        </div>     
          
        {{-- Button --}}
          <input class="btn btn-warning" type="submit" value="Salva modifiche">
    </form>    
@endsection