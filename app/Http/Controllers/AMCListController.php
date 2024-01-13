<?php

namespace App\Http\Controllers;

use App\Models\AMCList;
use Illuminate\Http\Request;

class AMCListController extends Controller
{
    public function amc_list(Request $request){
        $data['header_title']='AMC List';
        $data['getRecord']=AMCList::get_record($request);
        return view('admin.amc.list',$data);
    }
    public function amc_add(){
        $data['header_title']='Add AMC ';
        return view('admin.amc.add',$data);
    }
    public function amc_store(Request $request){
        $user=$request->validate([
            'name'=>'required|unique:amc_lists',
            'amount'=>'required',
        ]);
        $user=new AMCList();
        $user->name=trim($request->name);
        $user->amount=trim($request->amount);
        $user->business_category=trim($request->business_category);
        $user->series=trim($request->series);
        $user->save();

        return redirect('admin/amc/list')->with('success','Record Successfully Added');
    }
    public function amc_edit($id,Request $request){
        $data['getRecord']=AMCList::find($id);
        $data['header_title']='Edit AMC ';
        return view('admin.amc.edit',$data);
    }
    public function amc_update($id,Request $request){
        $user=$request->validate([
            'name'=>'required|unique:amc_lists,name,'.$id,
            'amount'=>'required',
        ]);
        $user=AMCList::find($id);
        $user->name=trim($request->name);
        $user->amount=trim($request->amount);
        $user->business_category=trim($request->business_category);
        $user->series=trim($request->series);
        $user->save();

        return redirect('admin/amc/list')->with('success','Record Successfully Updated');

    }
    public function amc_delete($id){
        $user=AMCList::find($id);
        $user->is_delete=1;
        $user->save();
        return redirect('admin/amc/list')->with('success','Record Successfully Deleted');

    }
}
