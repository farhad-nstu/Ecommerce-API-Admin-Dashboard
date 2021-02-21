<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate( $request, array(
            'title' => 'string|required'
        ) );

        $category = new Category;
        $category->title = $request->title;
        $category->save();
        return back()->with( 'message', 'New Category added successfully' );
    }

    public function update(Request $request, $id)
    {
        $this->validate( $request, array(
            'title' => 'string|required'
        ) );

        $category = Category::find($id);
        $category->title = $request->title;
        $category->update();
        return redirect()->route('category.index')->with( 'message', 'Category Updated Successfully' );
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with( 'success', 'Category deleted successfully' );
    }
}
