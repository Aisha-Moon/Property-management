<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmcFreeService extends Model
{
    use HasFactory;
    protected $table='amc_free_services';

    static public function get_free_service($id){
        $return=self::select('amc_free_services.*')
            ->where('amc_id',$id)
            ->orderBy('id','desc');

         $return=$return->paginate(3);
         return $return;
    }
    static public function get_single($id){
        return self::find($id);
    }

}
