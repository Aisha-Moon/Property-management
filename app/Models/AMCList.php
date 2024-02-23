<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AMCList extends Model
{
    use HasFactory;

    protected $table='amc_lists';

    static public function get_record($id){

        $return=self::select('amc_lists.*')
                ->orderBy('id','desc')
                ->where('is_delete',0);
               $return=$return->paginate(2);
          return $return;
    }
    static public function get_single($id){
        return self::find($id);
    }

    static public function get_record_delete(){
        return self::where('is_delete',0)->get();
    }
    public function option(){
        return $this->hasMany(AmcFreeService::class,'amc_id');
    }
}
