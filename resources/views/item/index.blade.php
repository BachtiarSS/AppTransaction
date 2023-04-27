@extends('layouts.main')

@section('konten')
    <div class="container-fluid">
        <div class="col-md-6">
            <form action="{{ route('item.index') }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searchh" name="search"
                        value="{{ request('search') }}">
                    <button class="badge bg-info border-0" type="submit"> Search</button>
                </div>
            </form>
        </div>
        <form action="{{ route('transaction.index') }}">
            <button type="button" class="badge bg-info border-0"><a href="{{ route('item.create') }}"
                    style="text-decoration: none; color:whitesmoke; padding: 17px">Create</a></button>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name Item</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- {{ dd($items) }} --}}

                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td>{{ $item->category->name }}</td>

                                    <td>{{ $item->name }}</td>
                                    <td colspan="2">
                                        <button type="button" class="badge bg-info border-0"><a
                                                href="{{ route('item.edit', $item->id) }}"
                                                style="text-decoration: none; color:whitesmoke; padding: 7px">Edit</a></button>
                                        <form action="{{ route('item.destroy', $item->id) }}" method="POST">
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
                {{ $items->links() }}
            </div>
    </div>
@endsection
