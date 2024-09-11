<?php

namespace App\Http\Controllers\Bckend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

 public function index(){
     $categories =Category::all();
    return view("backend.category.index",compact("categories"));
 }
 public function categorystore(Request $request){
    $request->validate([
        "category_name"=>"required",
    ]);
    Category::create([
        "category_name"=> $request->category_name,
        "category_slug"=>str::slug($request->category_name,'-'),
    ]);
 return redirect()->route('category.index')->with('success','Category Insert Successfully!');
 }
 public function categorydelete($id){
    Category::find($id)->delete();
    return redirect()->route('category.index')->with('delete','Category delete Successfully!');
 }
public function category($id){
  $category=Category::where('id',$id)->first();
  return response()->json($category);
}
public function categoryupdate(Request $request){
    $category=Category::where('id',$request->id)->first();
    $category->update([
        "category_name"=> $request->category_name,
        "category_slug"=>str::slug($request->category_name,'-'),
    ]);
    return redirect()->route('category.index')->with('success','Category update Successfully!');
}

}
