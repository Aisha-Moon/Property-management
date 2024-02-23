<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function subcategory_list(Request $request){
        $data['header_title']='SubCategory List';
        $data['getRecord']=SubCategory::get_record($request);
        return view('admin.subcategory.list',$data);
    }

    public function subcategory_add(Request $request){
        $data['header_title']='ADD SubCategory';
        $data['getCategory']=Category::get_record($request);
        return view('admin.subcategory.add',$data);

    }
    public function subcategory_insert(Request $request){
        $store=$request->validate([
            'category_id' =>'required',
            'name'=>'required',
        ]);

        $store=new SubCategory();
        $store->name=trim($request->name);
        $store->category_id=trim($request->category_id);
        $store->save();
        return redirect('admin/sub_category/list')->with('success','SubCategory Created Successfully');

    }

    public function subcategory_edit(Request $request,$id){
        $data['header_title']='Edit SubCategory';
        $data['getRecord']=SubCategory::find($id);
        $data['getCategory']=Category::get_record($request);

        return view('admin.subcategory.edit',$data);

    }
    public function subcategory_update($id,Request $request){
        $store=$request->validate([
            'category_id' =>'required',
            'name'=>'required',
        ]);

        $store=SubCategory::find($id);
        $store->name=trim($request->name);
        $store->category_id=trim($request->category_id);
        $store->save();
        return redirect('admin/sub_category/list')->with('success','SubCategory Updated Successfully');

    }
    public function subcategory_delete(Request $request,$id){

        $subcategory=SubCategory::find($id);
        $subcategory->is_delete=1;
        $subcategory->save();
        return redirect('admin/sub_category/list')->with('success', 'SubCategory has been deleted successfully');


    }
}
