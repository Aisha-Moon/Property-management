<?php

namespace App\Http\Controllers;

use App\Models\AmcAddOns;
use App\Models\AmcFreeService;
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
    public function amc_add_ons_list($id,Request $request){
        $data['header_title']='Add Ons List';
        $data['getRecord']=AMCList::get_single($id);
        $data['get_add_ons']=AmcAddOns::get_add_ons($id);
        return view('admin.amc.add_ons_list',$data);

    }
    public function amc_add_add_ons($id,Request $request){

        $data['getRecord']=AMCList::get_single($id);
        $data['header_title']='Add ADD Ons';
        return view('admin.amc.add_add_ons',$data);


    }
    public function amc_store_add_ons(Request $request){

        $insert_r=request()->validate([
            'name'=>'required',
            'price'=>'required',
            'amc_id'=>'required',
        ]);
        $insert_r=new AmcAddOns();
        $insert_r->name=trim($request->name);
        $insert_r->amc_id=trim($request->amc_id);
        $insert_r->price=!empty($request->price) ? $request->price : '0';
        $insert_r->save();
        return redirect('admin/amc/add_ons/'.$request->amc_id)->with('success','Record Successfully Created');
    }
    public function amc_edit_add_ons($id,Request $request){

        $data['header_title']='EDIT ADD Ons';
        $data['getRecord']=AmcAddOns::get_single($id);

        return view('admin.amc.edit_add_ons',$data);

    }
    public function amc_update_add_ons($id,Request $request){
        $update=AmcAddOns::get_single($id);

        $update->name=trim($request->name);
        $update->price=!empty($request->price) ? $request->price : '0';
        $update->save();
        return redirect('admin/amc/add_ons/'.$update->amc_id)->with('success','Record Successfully Updated');

    }

    public function amc_delete_add_ons($id,Request $request){
        $delete=AmcAddOns::get_single($id);
        $delete->delete();

        return redirect()->back()->with('error','Record Successfully Deleted');

    }
    public function amc_free_services($id,Request $request){

        $data['header_title']='Amc Free Service';
        $data['getRecord']=AMCList::get_single($id);
        $data['get_free_service']=AmcFreeService::get_free_service($id);

        return view('admin.amc.free_service_list',$data);

    }
    public function amc_add_free_service($id,Request $request){

        $data['header_title']='Add Amc Free Service';
        $data['getRecord']=AMCList::get_single($id);

        return view('admin.amc.free_service_add',$data);
    }
    public function amc_create_free_service(Request $request){
        $insert=request()->validate([
            'amc_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'limits'=>'required'
        ]);

        $insert=new AmcFreeService();
        $insert->amc_id=trim($request->amc_id);
        $insert->name=trim($request->name);
        $insert->price=trim($request->price);
        $insert->limits=trim($request->limits);
        $insert->save();

        return redirect('admin/amc/free_services/'.$request->amc_id)->with('success','Amc Free Service Created Successfully');
    }

}
