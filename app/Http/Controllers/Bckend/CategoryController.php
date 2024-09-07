<?php

namespace App\Http\Controllers\Bckend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

 public function index(){
     $categories =Category::all();
    return view("backend.category.index",compact("categories"));
 }
}
