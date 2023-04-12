<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hasil = Item::where('user_id', Auth::user()->id)->latest();

        if (request('search')) {
            $hasil->where('name', 'like', '%' . request('search') . '%');
        }



        return view('item.index', [
            'items' => $hasil->paginate(5),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create', [
            'categories' => Category::all(),
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
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required'
        ]);

        Item::create([
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'name' => $request->name
        ]);

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        // dd($item);
        return view('item.edit', [
            'item' => Item::findOrFail($item->id),
            'categories' => Category::all(),
            // dd($item->name),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required'
        ]);

        // dd($category->id);
        $item = Item::findOrFail($item->id);
        $item->update([
            'category_id' => $request->category_id,
            'name' => $request->name
        ]);

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item = Item::with('transactions')->findOrFail($item->id);
        foreach ($item->transactions()->get() as $child) {
            $child->delete();
        }
        $item->delete();

        return redirect()->route('item.index');
    }
}
