<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPostsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories= Category::paginate(10);
        Session::flash('user_message','category not found');
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Category::create($request->all());
        Session::flash('category_message','Category ' . $request->name . ' was created!');
        return redirect()->route('postcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = Category::findOrFail($id);

        Session::flash('category_message', 'Category ' . $category->name . ' was updated');
        //$category->slug = Str::slug($request->name,'-');
        $category->update($request->all());
        return redirect()->route('postcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        Session::flash('category_message', $category->name . ' was deleted!');
        $category->delete();
        return redirect()->route('postcategories.index');
    }
    public function category(Category $category){
        $category->load(['posts.categories','posts.photo']);
        $posts = $category->posts()->with('categories', 'photo')->paginate(9);
        $allCategories = Category::all();
        $slides = $category->posts()->with('categories', 'photo')->latest()->take(4)->get();
        return view('category', compact('category','posts','allCategories','slides'));
    }
}
