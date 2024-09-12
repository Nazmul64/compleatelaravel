<?php

namespace App\Http\Controllers\Bckend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubcategoriesController extends Controller
{
    public function index(){
        $category=Category::all();
        $subcategory=Subcategories::all();
        return view('backend.subcategory.index',compact('category','subcategory'));
    }
    public function store(Request $request){
        $request->validate([
            'subcategory_name'=>'required',

        ]);
        Subcategories::create([
           'category_id'=>$request->category_id,
           'subcategory_name'=>$request->subcategory_name,
           'subcategory_sulg'=>Str::slug($request->subcategory_name,'-'),
        ]);
        return back()->with('success','Data Insert Successfully!');
    }
    public function subedit($id){
        $subcategory = Subcategories::find($id);  // Use find to directly get the subcategory by id
        return response()->json($subcategory);
    }
    public function delete($id){
        $subcategory=Subcategories::find($id);
        $subcategory->delete();
        return back()->with('delete','Data delete Successfully!');
    }
}
