@extends('item.layouts.main')

@section('konten')
    <div class="container-fluid">
        <button type="button" class="badge bg-dark border-0 mb-4"><a href="{{ route('item.index') }}"
                style="text-decoration: none; color:whitesmoke; padding: 17px">Back</a></button>
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{ route('item.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category ID</label>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="description" aria-describedby="emailHelp"
                                id="name" name="name">

                        </div>

                    </div>
                    <button type="submit" class="badge bg-dark border-0 mb-4">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection
