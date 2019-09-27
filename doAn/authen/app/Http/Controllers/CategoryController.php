<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
class CategoryController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $category=CategoryModel::paginate(5);

        if($user->can('view', CategoryModel::class)){
            return view('admin.pages.category.list',compact("category"));
        }
    }

    public function create()
    {
        $user = Auth::user();
        if($user->can('create', CategoryModel::class)){
            return view('admin.pages.category.add');
        }

    }


    public function store(StoreCategoryRequest $request)
    {
        $user = Auth::user();
        if($user->can('create', CategoryModel::class)){
            CategoryModel::create([
                'name' => $request->name,
                'slug' => $request->name,
                'status' => $request->status
            ]);
            return redirect()->route('category.index');
        }

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $user = Auth::user();
        if ($user->can('update', CategoryModel::class)) {
            $category = CategoryModel::find($id);
            return response()->json($category, 200);
        }
    }


    public function update(StoreCategoryRequest $request, $id)
    {




            $category= CategoryModel::find($id);
            $category->update(
                [
                    'name' => $request->name,
                    'slug' => $request->name,
                    'status' => $request->status
                ]
            );
            return response()->json(['success' => 'Sửa thành công']);
        }



    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->can('delete', CategoryModel::class)) {
            $category = CategoryModel::find($id);
            $category->delete();
            return response()->json(['success' => 'Xóa thành công']);
        }
    }
}
