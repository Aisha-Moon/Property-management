<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table="sub_categories";

    static public function get_record($request){

        $return=self::select('sub_categories.*','categories.category_name as category_name')
                ->join('categories','categories.id' ,'=','sub_categories.category_id')
                 ->orderBy('id','desc')
                 ->where('sub_categories.is_delete',0);
                $return=$return->paginate(2);
           return $return;
     }
}
