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

    {{-- Button link  --}}
    <a class="btn btn-success" href="{{ route('admin.posts.edit', ['post' => $post->id])}}">Modifica post</a>
@endsection 