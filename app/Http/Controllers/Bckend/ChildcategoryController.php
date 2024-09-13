<?php

namespace App\Http\Controllers\Bckend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategories;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ChildcategoryController extends Controller
{
    public function index(Request $request){
      if($request->ajax()){
        $data=DB::table('childcategories')->leftJoin('categories','childcategories.category_id','categories.id')
        ->leftJoin('subcategories','childcategories.subcategory_id','subcategories.id')
        ->select('categories.catgegory_name','subcategories.subcategory_name','childcategories.*')->get();
        return  DataTables::of($data)
        ->addColumn('action',function($row){
           $actionbtn=' <a href=""id="edit" data-toggle="modal" class="btn btn-success edit" data-id="{{ $item->id }}" data-target="#editModal"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>';
                return $actionbtn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }
      return view('backend.childcategory.index');
    }
}
