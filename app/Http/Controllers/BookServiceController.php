<?php

namespace App\Http\Controllers;

use App\Models\AMCList;
use App\Models\ServiceType;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookServiceController extends Controller
{
    public function book_service_add(Request $request){
        $data['header_title']='Book a Service';
        $data['getServiceType']=ServiceType::get_record_delete();
        $data['getCategory']=Category::get_record_delete();
       $data['getAmcFreeService']=AMCList::where('id',Auth::user()->amc_id)->first();
        return view('user.book_service.add',$data);
    }
    public function sub_category_dropdown(Request $request){
        $data['get_sub_category']=SubCategory::where('category_id',$request->cat_id)->get(["name","id"]);
        return response()->json($data);

    }
}
