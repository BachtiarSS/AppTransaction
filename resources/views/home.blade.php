@extends('layouts.main')

@section('konten')
    <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
@endsection
