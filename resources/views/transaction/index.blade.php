@extends('layouts.main')

@section('konten')
    {{-- Konten --}}
    {{-- Konten --}}
    <button type="text"class="badge bg-dark border-0 mb-5"> <a href="{{ route('transaction.create') }}"
            style="text-decoration: none; color:aliceblue">Add
            Transaction</a></button>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ route('transaction.index') }}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Searchh" name="search"
                            value="{{ request('search') }}">
                        <button class="badge bg-info border-0" type="submit"> Search</button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Item</th>
                            <th scope="col">Status</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amont</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $transaction->item->name }}</td>
                                @if ($transaction->status == '1')
                                    <td>PEMASUKAN</td>
                                @elseif ($transaction->status == '2')
                                    <td>PENGELUARAN</td>
                                @else
                                    <td>{{ $transaction->status }}</td>
                                @endif

                                <td>{{ $transaction->description }}</td>
                                <td>Rp .{{ $transaction->amount }}</td>
                                <td colspan="2">
                                    <button type="button" class="badge bg-info border-0"><a
                                            href="{{ route('transaction.edit', $transaction->id) }}"
                                            style="text-decoration: none; color:whitesmoke; padding: 7px">Edit</a></button>
                                    <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
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
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">PEMASUKAN</th>
                            <th scope="col">PENGELUARAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Rp.{{ $income }}</th>
                            <td>Rp.{{ $expense }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{ $transactions->links() }}

    <div>

    </div>
    <div class="mb-5 mt-5"></div>
    {{-- Konten --}}
    {{-- Konten --}}
@endsection
