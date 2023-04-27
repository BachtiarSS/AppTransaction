@extends('layouts.main')

@section('konten')
    <div class="container">
        <button type="text"class="btn btn-dark border-0 mb-5" style="padding: 5px"> <a
                href="{{ route('transaction.index') }}" style="text-decoration: none; color:aliceblue">Back</a></button>
        <div class="row">

            <div class="col-lg-8">
                <form method="POST" action="{{ route('transaction.update', $transaction->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="item_id" class="form-label">Nama Item</label>
                        <select class="form-select" aria-label="Default select example" name="item_id"
                            value="{{ old('item_id', $transaction->item_id) }}">
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status"
                            value="{{ old('status', $transaction->status) }}">
                            <option value="1">PEMASUKAN</option>
                            <option value="2">PENGELUARAN</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" aria-describedby="emailHelp"
                            name="description" value="{{ old('description', $transaction->description) }}">

                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="description" aria-describedby="emailHelp"
                            name="amount" value="{{ old('amount', $transaction->amount) }}">

                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>
@endsection
