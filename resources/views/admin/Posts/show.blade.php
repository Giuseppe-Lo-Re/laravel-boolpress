@extends('layouts.dashboard')

@section('content')

    {{-- Alert confirm created message --}}
    @if ($show_created_message === 'yes')
        <div class="alert alert-success" role="alert">
            Post creato con successo!
        </div>
    @endif

    {{-- Title --}}
    <h1>{{ $post->title }}</h1>

    {{-- Created at --}}
    <div>Creato: {{ $post->created_at->format('l, j F Y') }}, 
        @if ($created_days_ago > 0)
            {{$created_days_ago }} giorni fa
        @else 
            oggi 
        @endif 
    </div>

    {{-- Updated at --}}
    <div>Ultima modifica: {{ $post->created_at->format('l, j F Y') }}</div>

    {{-- Slug --}}
    <div>Slug: {{ $post->slug }}</div>

    {{-- Category --}}
    <div>Categoria: {{ $post->category ? $post->category->name : 'nessuna' }}</div>
    
    {{-- Tags --}}
    <div>
        Tags:

        @if (!$post->tags->isEmpty()){
            @foreach ($post->tags as $tag)
                {{ $tag->name }} {{ !$loop->last ? ',' : '' }}
            @endforeach
        }
        @else
            nessuno
        @endif
    </div>
    
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