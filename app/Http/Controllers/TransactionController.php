<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Auth::user()->id);
        $hasil = Transaction::where('user_id', Auth::user()->id)->latest();

        if (request('search')) {
            $hasil->where('description', 'like', '%' . request('search') . '%')
                ->orWhere('amount', 'like', '%' . request('search') . '%');
        }

        return view('transaction.index', [
            'transactions' => $hasil->paginate(4),
            'item' => Item::all(),
            'income' => Transaction::where('status', '1')->where('user_id', Auth::user()->id)->sum('amount'),
            'expense' => Transaction::where('status', '2')->where('user_id', Auth::user()->id)->sum('amount'),

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.create', [
            'transactions' => Transaction::all(),
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'item_id' => 'required',
        //     'status' => 'required',
        //     'description' => 'required',
        //     'amount' => 'required',
        // ]);

        Transaction::create([
            'item_id' => $request->item_id,
            'user_id' => Auth::user()->id,
            'status' => $request->status,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);


        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', [
            'transaction' => Transaction::findOrFail($transaction->id),
            'items' => Item::all(),
            // dd($item->name),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->validate($request, [
            'item_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);

        // dd($category->id);
        $transaction = Transaction::findOrFail($transaction->id);
        $transaction->update([
            'item_id' => $request->item_id,
            'status' => $request->status,
            'description' => $request->description,
            'amount' => $request->amount
        ]);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction = Transaction::findOrFail($transaction->id);
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
