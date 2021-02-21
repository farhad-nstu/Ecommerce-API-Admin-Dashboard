<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $brands = brand::orderBy('id', 'desc')->get();
        return view('dashboard.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $this->validate( $request, array(
            'title' => 'string|required'
        ) );

        $brand = new brand;
        $brand->title = $request->title;
        $brand->save();
        return back()->with( 'message', 'New brand added successfully' );
    }

    public function update(Request $request, $id)
    {
        $this->validate( $request, array(
            'title' => 'string|required'
        ) );

        $brand = brand::find($id);
        $brand->title = $request->title;
        $brand->update();
        return redirect()->route('brand.index')->with( 'message', 'brand Updated Successfully' );
    }

    public function destroy($id)
    {
        $brand = brand::find($id);
        $brand->delete();
        return redirect()->back()->with( 'success', 'brand deleted successfully' );
    }
}
