@extends('layouts.dashboard')

@section('content')
    <h1>Crea un nuovo post</h1>

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

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf

        {{-- Category --}}
        <div class="mb-3">
            <label for="category_id">Categoria:</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">nessuna</option>

                {{-- Stampo id e name di categories nelle value --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="10" name="content" value="{{ old('content') }}"></textarea>
        </div>     
          
        {{-- Button --}}
          <input class="btn btn-success" type="submit" value="Salva post">
    </form>
@endsection 