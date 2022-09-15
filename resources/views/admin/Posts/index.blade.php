@extends('layouts.dashboard')

@section('content')
    <h1>Lista post</h1>

    {{-- Alert confirm deleted message --}}
    @if ($show_deleted_message === 'yes')
        <div class="alert alert-success" role="alert">
            Post eliminato con successo!
        </div>
    @endif

    <div class="row row-cols-3 gy-5">
        @foreach ($posts as $post)
            
            {{-- Single Card --}}
            <div class="col">
                <div class="card mt-5">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    <a href="{{ route('admin.posts.show', ['post' =>$post->id]) }}" class="btn btn-success">dettagli</a>
                    </div>
                </div>
            </div>
            {{-- End Single Card --}}
        @endforeach

        {{-- Page selector --}}
        <div class="mt-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection     