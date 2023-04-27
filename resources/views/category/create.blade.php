@extends('layouts.main')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <button type="button" class="btn btn-dark text-dark mt-3 mb-3"><a href="{{ route('category.index') }}"
                        style="text-decoration: none; color: whitesmoke">
                        <span data-feather="chevron-left"></span>
                        Back</a></button>
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">
                            <h5>Add Category</h5>
                        </label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add

                        <span data-feather="chevron-right"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
