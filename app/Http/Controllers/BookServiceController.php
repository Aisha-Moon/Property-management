<?php

namespace App\Http\Controllers;

use App\Models\AMCList;
use App\Models\BookService;
use App\Models\ServiceType;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BookServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookServiceController extends Controller


{

    public function book_service_list(Request $request){
        $data['header_title']='Book Service List';
        return view('user.book_service.list',$data);


    }
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
    public function book_service_store(Request $request)
    {
        $user = new BookService;
        $user->user_id = Auth::user()->id;
        $user->service_type_id = trim($request->service_type_id);
        $user->category_id = $request->category_id;
        $user->sub_category_id = $request->sub_category_id;
        $user->amc_free_service_id = trim($request->amc_free_service_id);
        $user->description = trim($request->description);
        $user->special_instryctions = trim($request->special_instryctions);
        $user->pet = trim($request->pet);
        $user->available_date = trim($request->available_date);
        $user->save();

        if (!empty($request->option)) {
            foreach ($request->option as $value) {
                if (!empty($value['attachment_image'])) {
                    $option_ind = new BookServiceImage;
                    $option_ind->book_service_id = $user->id;

                    // Upload and save the image
                    $file = $value['attachment_image'];
                    $randomStr = Str::random(30);
                    $filename = $randomStr . '.' . $file->getClientOriginalExtension();
                    $file->move('upload/service/', $filename);

                    // Set the attachment_image field
                    $option_ind->attachment_image = $filename;

                    $option_ind->save();
                }
            }
        }

        return redirect('user/book_service/add')->with('success', 'Record Successfully added');
    }

}
