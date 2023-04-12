@extends('item.layouts.main')
@section('konten')
    {{-- @dd($item) --}}
    <div class="container">
        <button type="submit" class="badge bg-dark border-0 mb-4"><a href="{{ route('item.index') }}"
                style="text-decoration: none; color:antiquewhite; ">Back</a></button>
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{ route('item.update', $item->id) }}">
                    @csrf
                    @method('PUT')
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
                                id="name" name="name" value="{{ old('name', $item->name) }}"">

                        </div>

                    </div>
                    <button type="submit" class="badge bg-dark border-0 mb-4">Update</button>
                </form>
            </div>
        </div>
    </div>


    {{-- <form method="POST" action="{{ route('item.update', $item->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <ul>
                <li>
                    <label for="category_id">Category</label>
                    <div class="mb-3">
                        <select class="custom-select" required name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                </li>
                <li>
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $item->name) }}">
                </li>
            </ul>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}
@endsection
