@extends('layouts.main')
@section('konten')
    {{-- Konten --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <button type="button" class="btn btn-dark text-dark mt-3 mb-3"><a href="{{ route('category.index') }}"
                        style="text-decoration: none; color: whitesmoke">Back</a></button>
                <form method="POST" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $category->name) }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Konten --}}
@endsection
