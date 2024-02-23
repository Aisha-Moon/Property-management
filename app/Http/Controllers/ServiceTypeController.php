<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;

class ServiceTypeController extends Controller
{
    public function service_type_list(Request $request){
        $data['header_title']='Service Type LIST';
        $data['getRecord']=ServiceType::get_record($request);
        return view('admin.service_type.list',$data);
    }
    public function service_type_add(){
        $data['header_title']='Add Service Type ';
        return view('admin.service_type.add',$data);
    }

    public function service_type_store(Request $request){
       $save=$request->validate([
        'name'=>'required|unique:service_types',
       ]);

       $save=new ServiceType();
       $save->name=trim($request->name);
       $save->save();

       return redirect('admin/service_type/list')->with('success','Record Created Successfully');

    }
    public function service_type_edit(Request $request,$id){
        $data['header_title']='Edit Service Type';
        $data['getRecord']=ServiceType::find($id);
        return view('admin.service_type.edit',$data);

    }

    public function service_type_update(Request $request,$id){
        $save=$request->validate([
         'name'=>'required|unique:service_types,name,'.$id,
        ]);

        $save=ServiceType::find($id);
        $save->name=trim($request->name);
        $save->save();

        return redirect('admin/service_type/list')->with('success','Record Updated Successfully');

     }

     public function service_type_delete(Request $request,$id){

        $service_type=ServiceType::find($id);
        $service_type->is_delete=1;
        $service_type->save();
        return redirect('admin/service_type/list')->with('success', 'Service Type has been deleted successfully');


    }



}
