<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request){
        $data['header_title']='Admin';
        return view('admin.dashboard.index',$data);
    }
    public function user_dashboard(Request $request){
        $data['header_title']='User';

        return view('user.dashboard.index',$data);


    }
    public function vendor_dashboard(Request $request){
        $data['header_title']='Vendor';

        return view('vendor.dashboard.index' ,$data);


    }
}
