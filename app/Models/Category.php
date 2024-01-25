<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    static public function get_record($request){

        $return=self::select('categories.*')
                ->orderBy('id','desc')
                ->where('is_delete',0);
               $return=$return->paginate(2);
          return $return;
    }
}
