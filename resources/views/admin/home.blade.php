@extends('layouts.dashboard')

@section('content')
    <h1> Dashboard Privata</h1>

    <div>
        Benvenuto {{ $user->name }}!
    </div>

    <div>
        La tua mail è {{ $user->email }}
    </div>
@endsection  