@extends('layouts.main')
@section('konten')
    {{-- Konten --}}
    {{-- Konten --}}
    <div class="container-fluid">
        <div class="col-md-6">
            <form action="{{ route('category.index') }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searchh" name="search"
                        value="{{ request('search') }}">
                    <button class="badge bg-info border-0" type="submit"> Search</button>
                </div>
            </form>
        </div>
        <a href="{{ route('category.create') }}" class="btn btn-info">Create</a>
        <div class="row">
            <div class="col-lg-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 10px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- {{ dd($categories) }} --}}

                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td colspan="2">
                                    <button type="button" class="badge bg-info border-0"><a
                                            href="{{ route('category.edit', $category->id) }}"
                                            style="text-decoration: none; color:whitesmoke; padding: 7px">Edit</a></button>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"class="badge bg-dark border-0">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-lg-2"></div>
            {{ $categories->links() }}
        </div>
    </div>
    {{-- Konten --}}
    {{-- Konten --}}
@endsection
