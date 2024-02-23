<?php

namespace App\Http\Controllers;

use App\Models\VendorType;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\VendorRegisterMail;
use App\Http\Requests\ResetPassword;


class VendorController extends Controller
{
    public function VendorList(Request $request){
        $data['header_title']='Vendor List';
        $data['getRecord']=User::get_record($request);
        return view('admin.vendor.list',$data);

    }
    public function VendorAdd(Request $request){
        $data['header_title']='Add Vendor ';
        $data['getVendorType']=VendorType::get_record($request);
        $data['getCategoryType']=Category::get_record($request);
        return view('admin.vendor.add',$data);

    }
    public function VendorStore(Request $request){
        $user=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'status'=>'required',
            'category_id'=>'required',
            'vendor_type_id'=>'required',
        ]);
        $user=new User;
        $user->name          =trim($request->name);
        $user->last_name           =trim($request->last_name);
        $user->email               =trim($request->email);
        $user->mobile              =trim($request->mobile);

        if(!empty($request->file('profile'))){
            $file=$request->file('profile');
            $randomStr=Str::random(50);
            $filename=$randomStr.'.'.$file->getClientOriginalExtension();
            if ($file->move('upload/profile/', $filename)) {
                // File moved successfully, update user's profile attribute
                $user->profile = $filename;
            } else {
                // Handle file upload error
                return back()->with('error', 'Failed to upload profile photo');
            }

        }
        $user->vendor_type_id          =trim($request->vendor_type_id);
        $user->company_name            =trim($request->company_name);
        $user->employee_id         =trim($request->employee_id);
        $user->category_id         =trim($request->category_id);
        $user->status                  =trim($request->status);
        $user->always_assign       =trim($request->always_assign);
        $user->is_admin=2;
        $user->remember_token=Str::random(50);
        $user->forgot_token=Str::random(50);

        $user->save();
        $this->send_vendor_verification_mail($user);


        return redirect('admin/vendor/list')->with('success','Record Successfully Created');
    }

    public function send_vendor_verification_mail($user){
        Mail::to($user->email)->send(new VendorRegisterMail($user));
    }
    public function vendor_password(Request $request,$token){
        $user=User::where('forgot_token',$token);

        if($user->count()==0){
            abort(404);
        }
        $user=$user->first();
        $data['token']=$token;
        $data['header_title']='Password Reset';
        return view('admin.vendor.password',$data);
    }
    public function vendor_password_post($token,ResetPassword $request){

        $user=User::where('forgot_token',$token);

        if($user->count()==0){
            abort(404);
        }
        $user=$user->first();
        $user->remember_token=Str::random(50);
        $user->forgot_token=Str::random(50);
        $user->password=Hash::make($request->password);
        $user->status=0;
        $user->save();

        return redirect('/')->with('success','Password has been reset');
    }
    public function VendorEdit($id,Request $request){
        $data['getrecord']=User::find($id);
        $data['header_title']='Edit Vendor ';
        $data['getVendorType']=VendorType::get_record($request);
        $data['getCategoryType']=Category::get_record($request);
        return view('admin.vendor.edit',$data);


    }
}
