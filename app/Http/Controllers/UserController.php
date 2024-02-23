<?php

namespace App\Http\Controllers;

use App\Models\AMCList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\facades\Mail;
use App\Mail\UserRegisterMail;

class UserController extends Controller
{
    public function userList(Request $request){
        $data['header_title']='User List';
        $data['getRecord']=User::get_record_user($request);
        return view('admin.user.list',$data);
    }
    public function userAdd(Request $request){
        $data['getAmc']=AMCList::get_record_delete();
        $data['header_title']='Add User ';

        return view('admin.user.add',$data);
    }
    public function userStore(Request $request){
        $user=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'amc_id'=>'required',
            'mobile'=>'required',

        ]);
        $dataAmc=AMCList::where('id',$request->amc_id)->first();
        $userDesc=User::orderBy('id','DESC')->where('amc_id',$request->amc_id)->first();
        $user=new User();
        $user->name        =trim($request->name);
        $user->last_name        =trim($request->last_name);
        $user->email        =trim($request->email);
        $user->mobile        =trim($request->mobile);
        $user->address       =trim($request->address);
        $user->amc_business_category_name =trim($request->amc_business_category_name);

        if(!empty($request->file('profile'))){
            $file=$request->file('profile');
            $randomStr=Str::random(50);
            $filename=$randomStr.'.'.$file->getClientOriginalExtension();
            if ($file->move('upload/profile/', $filename)) {
                $user->profile = $filename;
            } else {
                return back()->with('error', 'Failed to upload profile photo');
            }

        }

        if(!empty($userDesc)){
            $user->account_number=$userDesc->account_number + 1;

        }else{
            $user->account_number=trim($dataAmc->series);
        }

        $user->amc_id=trim($request->amc_id);
        $user->is_admin=0;
        $user->remember_token=Str::random(50);
        $user->forgot_token=Str::random(50);
        $user->save();

        $this->send_user_verification_mail($user);

        return redirect('admin/user/list')->with('success','User Registered Successfully');

    }

    public function send_user_verification_mail($user){
        Mail::to($user->email)->send(new UserRegisterMail($user));
    }
    public function userEdit(Request $request,$id){
        $data['header_title']='Edit User ';
        $data['getRecord']=User::getSingle($id);
        $data['getAmc']=AMCList::get_record_delete();

        return view('admin.user.edit',$data);

    }
    public function userUpdate(Request $request,$id){
         $user=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
         ]);
         $user=User::getSingle($id);
         $user->name=trim($request->name);
         $user->last_name=trim($request->last_name);
         $user->email=trim($request->email);
         $user->mobile=trim($request->mobile);
         $user->address=trim($request->address);
         if(!empty($request->file('profile'))){
            if(!empty($user->profile) && file_exists('upload/profile/'.$user->profile)){
                unlink('upload/profile/'.$user->profile);
            }
            $file=$request->file('profile');
            $randomStr=Str::random(50);
            $filename=$randomStr.'.'.$file->getClientOriginalExtension();
            if ($file->move('upload/profile/', $filename)) {
                $user->profile = $filename;
            } else {
                return back()->with('error', 'Failed to upload profile photo');
            }

        }
      $user->save();
      return redirect('admin/user/list')->with('success','User Updated Successfully');



    }
    public function userDelete(Request $request,$id){
        $user=User::getSingle($id);
        $user->is_delete=1;
        $user->save();
        return redirect('admin/user/list')->with('error','User Deleted Successfully');


    }
}
