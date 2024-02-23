<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorType;

class VendorTypeController extends Controller
{
    public function vendor_list(Request $request){
        $data['header_title']='Vendor Type LIST';
        $data['getRecord']=VendorType::get_record($request);
        return view('admin.vendor_type.list',$data);
    }
    public function vendor_add(){
        $data['header_title']='Add Vendor Type ';
        return view('admin.vendor_type.add',$data);
    }

    public function vendor_insert(Request $request){
       $save=$request->validate([
        'name'=>'required|unique:vendor_types',
       ]);

       $save=new VendorType();
       $save->name=trim($request->name);
       $save->save();

       return redirect('admin/vendor_type/list')->with('success','Record Created Successfully');

    }
    public function vendor_edit(Request $request,$id){
        $data['header_title']='Edit Service Type';
        $data['getRecord']=VendorType::find($id);
        return view('admin.vendor_type.edit',$data);

    }

    public function vendor_update(Request $request,$id){
        $save=$request->validate([
         'name'=>'required|unique:vendor_types,name,'.$id,
        ]);

        $save=VendorType::find($id);
        $save->name=trim($request->name);
        $save->save();

        return redirect('admin/vendor_type/list')->with('success','Record Updated Successfully');

     }

     public function vendor_delete(Request $request,$id){

        $service_type=VendorType::find($id);
        $service_type->is_delete=1;
        $service_type->save();
        return redirect('admin/vendor_type/list')->with('success', 'VendorType  has been deleted successfully');


    }


}
