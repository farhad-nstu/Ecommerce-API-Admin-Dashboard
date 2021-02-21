<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;

class SubCategoryController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $subCategories = SubCategory::orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('dashboard.subCategories.index', compact('subCategories', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate( $request, array(
            'title' => 'string|required',
            'category_id' => 'required'
        ) );

        $category = new SubCategory;
        $category->category_id = $request->category_id;
        $category->title = $request->title;
        $category->save();
        return back()->with( 'message', 'Sub Category added successfully' );
    }

    public function update(Request $request, $id)
    {
        $this->validate( $request, array(
            'title' => 'string|required',
            'category_id' => 'required'
        ) );

        $category = SubCategory::find($id);
        $category->category_id = $request->category_id;
        $category->title = $request->title;
        $category->update();
        return back()->with( 'message', 'Sub Category Updated Successfully' );
    }

    public function destroy($id)
    {
        $category = SubCategory::find($id);
        $category->delete();
        return back()->with( 'success', 'Sub Category deleted successfully' );
    }
}
