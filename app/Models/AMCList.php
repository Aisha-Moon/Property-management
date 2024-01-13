<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AMCList extends Model
{
    use HasFactory;

    protected $table='amc_lists';

    static public function get_record($request){

        $return=self::select('amc_lists.*')
                ->orderBy('id','desc')
                ->where('is_delete',0);
               $return=$return->paginate(2);
          return $return;
    }
}
