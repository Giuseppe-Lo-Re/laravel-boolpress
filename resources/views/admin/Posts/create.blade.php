@extends('layouts.dashboard')

@section('content')
    <h1>Crea un nuovo post</h1>

    <form action="{{ route('admin.post.store') }}" method="post">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="10" name="content"></textarea>
        </div>     
          
        {{-- Button --}}
          <input type="submit" value="Salva post">
    </form>
@endsection 