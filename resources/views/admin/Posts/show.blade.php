@extends('layouts.dashboard')

@section('content')
    {{-- Title --}}
    <h1>{{ $post->title }}</h1>

    {{-- Created at --}}
    <div>Creato il:{{ $post->created_at }}</div>

    {{-- Updated at --}}
    <div>Ultima modifica:{{ $post->updated_at }}</div>

    {{-- Slug --}}
    <div>Slug:{{ $post->slug }}</div>
    
    {{-- Content --}}
    <h3 class="mt-3">Contenuto</h3>
    <p>{{ $post->content }}</p>

    {{-- Modification Button (Link) --}}
    <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $post->id])}}">Modifica post</a>

    {{-- Delete Button (Form) --}}
    <form class="mt-2" action="{{ route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger" type="submit" value="Elimina   post" onCLick="return confirm('Stai per eliminare un post. Sei sicuro?')">
    </form>
    
@endsection 