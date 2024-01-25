<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list(Request $request){
        $data['header_title']='Category List';
        $data['getRecord']=Category::get_record($request);

        return view('admin.category.list',$data);
    }
    public function category_add(Request $request){
        $data['header_title']='ADD Category';
        return view('admin.category.add',$data);

    }
    public function  category_insert(Request $request){
        $category=$request->validate([
            'category_name'=>'required|unique:categories',
            
        ]);
        $category=new Category();
        $category->category_name=trim($request->category_name);
        $category->save();

        return redirect('admin/category/list')->with('success','Category has been successfully Added');

    }
    public function category_edit(Request $request,$id){
        $data['header_title']='Edit Category';
        $data['getRecord']=Category::find($id);
        return view('admin.category.edit',$data);
 
    }
    public function category_update(Request $request,$id){

        $category=$request->validate([
            'category_name'=>'required|unique:categories,category_name,'.$id,
            
        ]);
        $category=Category::find($id);
        $category->category_name=trim($request->category_name);
        $category->save();

        return redirect('admin/category/list')->with('success','Category has been successfully Updated');

    }
    public function category_delete(Request $request,$id){

        $category=Category::find($id);
        $category->is_delete=1;
        $category->save();
        return redirect('admin/category/list')->with('success', 'Category has been deleted successfully');

        
    }
}
