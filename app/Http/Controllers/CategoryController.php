<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hasil = Category::where('user_id', Auth::user()->id)->latest();
        if (request('search')) {
            $hasil->where('name', 'like', '%' . request('search') . '%');
        }


        $categories = Category::all();
        // dd($categories);
        return view('category.index', [
            'title' => 'Halaman Category',
            'pageTitle' => 'Halaman Category',
            'categories' => $hasil->paginate(2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create', [
            'title' => 'Add Category',
            'pageTitle' => 'Add Category',
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
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('category.edit', [
            'title' => 'Update Category',
            'pageTitle' => 'Update Category',
            'category' => Category::findOrFail($category->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        // dd($category->id);
        $category = Category::findOrFail($category->id);
        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // dd($category->id);
        $category = Category::with('items')->findOrFail($category->id);

        foreach ($category->items()->get() as $child) {
            $child->delete();
        }
        $category->delete();

        return redirect()->route('category.index');
    }
}
